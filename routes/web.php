<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BinaryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::view('/terms', 'terms')->name('terms.show');
Route::view('/privacy', 'policy')->name('policy.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Phase 1: MLM Packages
    Route::get('/packages', [PackageController::class, 'index'])->name('packages');
    Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
    Route::post('/packages/purchase', [PackageController::class, 'purchase'])->name('packages.purchase');
    
    // Phase 2: Product Marketplace
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/products/category/{slug}', [ProductController::class, 'category'])->name('products.category');
    Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    
    // Binary & Rewards
    Route::get('/binary-tree', [BinaryController::class, 'index'])->name('binary.tree');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/farming', [FarmingController::class, 'index'])->name('farming');
});

// Public verification routes (no auth required)
Route::get('/verify/{batchId}', [VerificationController::class, 'show'])->name('verify.batch');
Route::get('/verify/{batchId}/download', [VerificationController::class, 'download'])->name('verify.download');
Route::get('/api/verify/{batchId}', [VerificationController::class, 'verify'])->name('api.verify.batch');

// Admin routes
Route::middleware(['auth:sanctum', 'verified', 'can:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');

    // Landing page CMS
    Route::get('/landing', [AdminController::class, 'landing'])->name('admin.landing');
    Route::post('/landing', [AdminController::class, 'updateLanding'])->name('admin.landing.update');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/testimonials/create', [AdminController::class, 'createTestimonial'])->name('admin.testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [AdminController::class, 'editTestimonial'])->name('admin.testimonials.edit');
    Route::post('/testimonials/{testimonial}', [AdminController::class, 'updateTestimonial'])->name('admin.testimonials.update');
    Route::post('/testimonials/{testimonial}/delete', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
});