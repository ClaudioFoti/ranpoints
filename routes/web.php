<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Logged in Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', \App\Http\Controllers\HomeController::class)->name('home');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
});
