<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\User;

// 🔷 Landing page
Route::get('/', function () {
    $jumlahSiswa = User::where('role', 'user')->count();

    return view('welcome', [
        'jumlahSiswa' => $jumlahSiswa,
        'isLoggedIn' => auth()->check(),
    ]);
})->name('home');

// 🔷 Dashboard USER (read-only)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        // Ambil semua user dengan role user
        $users = User::where('role', 'user')->get();

        return view('dashboard', compact('users'));
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔷 Dashboard ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__.'/auth.php';
