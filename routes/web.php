<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\PostLikeController;

// Home
Route::get('/', function() {
    return view('home');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

// Videos
Route::resource('/videos', VideosController::class);

// Appartments
Route::resource('/apartments', ApartmentsController::class);

// Likes
Route::post('/posts/{id}/likes', [PostLikeController::class, 'store'])->name('posts.like');
