<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Halaman utama warga (guest)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lokasi/{id}', [HomeController::class, 'showLocation'])->name('location.show');
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Halaman admin (hanya bisa diakses jika sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Admin Profile
    Route::get('/admin/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/password', [AuthController::class, 'updatePassword'])->name('admin.password.update');

    // Admin Locations CRUD
    Route::resource('admin/locations', \App\Http\Controllers\Admin\LocationController::class)->names('admin.locations');

    // Admin Categories CRUD
    Route::resource('admin/categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
});
