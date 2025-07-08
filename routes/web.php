<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreatorController;

Route::get('/', function () {
    return redirect()->route('dashboard'); // arahkan ke dashboard
});

Route::get('/dashboard', function () {
    return view('dashboard'); // tampilkan view dashboard.blade.php
})->name('dashboard');

Route::resource('artworks', ArtworkController::class);
Route::resource('categories', CategoryController::class);
Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('creators', CreatorController::class);
Route::resource('comments', CommentController::class)->only(['index', 'edit', 'update', 'destroy']);
// Tampilkan form login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Proses login
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Logout admin
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Tambahkan route admin lainnya di sini...
});





