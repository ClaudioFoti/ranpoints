<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::resource('posts', \App\Http\Controllers\PostController::class);

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Logged in Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
});
