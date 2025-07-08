<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Models\User;

// 🔷 Landing page
Route::get('/', function () {
    $jumlahSiswa = User::where('role', 'user')->count();

    return view('welcome', [
        'jumlahSiswa' => $jumlahSiswa,
        'isLoggedIn' => auth()->check(),
    ]);
})->name('home');

// 🔷 Admin Auth routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// 🔷 Dashboard ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

// 🔷 Dashboard USER
Route::get('/dashboard', function () {
    $users = User::where('role', 'user')->get();

    return view('dashboard', [
        'users' => $users,
        'isLoggedIn' => auth()->check(),
    ]);
})->name('dashboard');

// 🔷 Profile (khusus user login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
