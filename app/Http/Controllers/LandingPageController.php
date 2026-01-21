<?php

namespace App\Http\Controllers;

use App\Models\LandingPageSetting;
use App\Models\Testimonial;

class LandingPageController extends Controller
{
    public function index()
    {
        $settings = LandingPageSetting::first();
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('settings', 'testimonials'));
    }
}

