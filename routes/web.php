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
    Route::resource('interactions', \App\Http\Controllers\PostUserController::class);
    Route::resource('posts', \App\Http\Controllers\PostController::class)->only('create', 'show', 'index', 'store');
    Route::resource('users', \App\Http\Controllers\UserController::class)->only('show');
    Route::prefix('leaderboards')->group(function () {
        Route::get('posts', [\App\Http\Controllers\LeaderboardsController::class, 'posts'])->name('posts_leaderboards');
        Route::get('users', [\App\Http\Controllers\LeaderboardsController::class, 'users'])->name('users_leaderboards');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class)->except('create', 'show', 'index', 'store');
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');
});
