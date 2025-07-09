<?php

use App\Http\Controllers\Admin\AdminUserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// =================================
// Landing page
// =================================
Route::get('/', function () {
    $jumlahSiswa = User::where('role', 'user')->count();

    return view('welcome', [
        'jumlahSiswa' => $jumlahSiswa,
        'isLoggedIn' => auth()->check(),
    ]);
})->name('home');

// =================================
// Laravel Breeze Auth routes
// =================================
require __DIR__.'/auth.php';

// =================================
// Admin
// =================================

//  Admin login/logout
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//  Admin Dashboard & User Management
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminUserManagementController::class, 'index'])->name('dashboard');
    Route::get('/users/create', [AdminUserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminUserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserManagementController::class, 'destroy'])->name('users.destroy');
});

// =================================
// User (authenticated & verified)
// =================================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::where('role', 'user')->get();

        return view('dashboard', [
            'users' => $users,
            'isLoggedIn' => auth()->check(),
        ]);
    })->name('dashboard');

    //  Profile User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
