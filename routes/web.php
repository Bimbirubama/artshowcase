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
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');

// ✅ Proses login
Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/', [ArtworkController::class, 'publicIndex'])->name('dashboard.public');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



// Route::prefix('admin')->middleware('admin')->group(function () {
//     Route::get('/dashboard', function() {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     // Tambahkan route admin lainnya di sini...
// });





