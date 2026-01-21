<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Transaction;
use App\Models\LandingPageSetting;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'transactions' => Transaction::count(),
            'earnings' => Transaction::where('status', 'completed')->sum('amount'),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(25);
        return view('admin.users', compact('users'));
    }

    public function transactions()
    {
        $transactions = Transaction::latest()->paginate(25);
        return view('admin.transactions', compact('transactions'));
    }

    public function landing()
    {
        $settings = LandingPageSetting::firstOrCreate(['id' => 1], []);
        return view('admin.landing', compact('settings'));
    }

    public function updateLanding(Request $request)
    {
        $settings = LandingPageSetting::firstOrCreate(['id' => 1], []);

        $data = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string|max:2000',
            'rwa_title' => 'required|string|max:255',
            'rwa_body' => 'nullable|string',
            'cta_text' => 'required|string|max:255',
            'cta_link' => 'required|string|max:255',
            'hero_image' => 'nullable|image|max:4096',
            'rwa_image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('landing', 'public');
            $data['hero_image_path'] = $path;
        }
        if ($request->hasFile('rwa_image')) {
            $path = $request->file('rwa_image')->store('landing', 'public');
            $data['rwa_image_path'] = $path;
        }

        $data['updated_by'] = auth()->id();
        $settings->update($data);

        return redirect()->route('admin.landing')->with('status', 'Landing page updated.');
    }

    public function testimonials()
    {
        $testimonials = Testimonial::orderBy('sort_order')->latest()->paginate(25);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    public function storeTestimonial(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'quote' => 'required|string|max:2000',
            'sort_order' => 'nullable|integer|min:0|max:1000000',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('testimonials', 'public');
        }

        $data['is_active'] = (bool) ($request->get('is_active', true));
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials')->with('status', 'Testimonial created.');
    }

    public function editTestimonial(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'quote' => 'required|string|max:2000',
            'sort_order' => 'nullable|integer|min:0|max:1000000',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('testimonials', 'public');
        }

        $data['is_active'] = (bool) ($request->get('is_active', false));
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials')->with('status', 'Testimonial updated.');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials')->with('status', 'Testimonial deleted.');
    }
}
