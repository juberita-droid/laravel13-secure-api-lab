<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Public route
Route::get('/hello', function () {
    return response()->json([
        'message' => 'Welcome to the Laravel 13 API',
    ]);
});

// Registration
Route::post('/register', [AuthController::class, 'register'])
    ->middleware('throttle:6,1');

// Login
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1');

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {

    // Profile
    Route::get('/profile', [AuthController::class, 'profile']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin and student can access students list
    Route::get('/students', function () {
        return response()->json([
            'message' => 'Students list accessed successfully.',
        ]);
    })->middleware('role:admin,student');

    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return response()->json([
            'message' => 'Welcome to the Admin Dashboard.',
        ]);
    })->middleware('admin');

    // Student dashboard
    Route::get('/student/dashboard', function () {
        return response()->json([
            'message' => 'Welcome to the Student Dashboard.',
        ]);
    })->middleware('role:student');

});
