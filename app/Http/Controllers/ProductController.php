<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->active();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('health_benefits', 'like', "%{$search}%");
            });
        }

        // Sort by price if requested
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === 'name') {
                $query->orderBy('name', 'asc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12);
        $categories = ProductCategory::active()->withCount('products')->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display a specific product
     */
    public function show(Product $product)
    {
        $product->load('category', 'packages');
        
        // Get related products from the same category
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Display products by category
     */
    public function category($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        $products = Product::active()
            ->where('category_id', $category->id)
            ->orderBy('name')
            ->paginate(12);
        
        $categories = ProductCategory::active()->withCount('products')->get();

        return view('products.category', compact('category', 'products', 'categories'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $search = $request->input('q');
        
        $products = Product::active()
            ->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('health_benefits', 'like', "%{$search}%");
            })
            ->with('category')
            ->paginate(12);

        $categories = ProductCategory::active()->withCount('products')->get();

        return view('products.index', compact('products', 'categories', 'search'));
    }
}
