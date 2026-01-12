<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BinaryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FarmingController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});



//redirect()->route('welcome');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/packages', [PackageController::class, 'index'])->name('packages');
    Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
    Route::post('/packages/purchase', [PackageController::class, 'purchase'])->name('packages.purchase');
    Route::get('/binary-tree', [BinaryController::class, 'index'])->name('binary.tree');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/farming', [FarmingController::class, 'index'])->name('farming');
});

// Admin routes
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
});