<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ⭐ Sponsor validation endpoint for registration
Route::get('/check-sponsor/{id}', function ($id) {
    $user = User::find($id);
    
    if (!$user) {
        return response()->json([
            'valid' => false,
            'message' => 'User not found'
        ]);
    }
    
    if (!$user->is_active) {
        return response()->json([
            'valid' => false,
            'message' => 'Sponsor is not active'
        ]);
    }
    
    return response()->json([
        'valid' => true,
        'name' => $user->name,
        'id' => $user->id
    ]);
});
