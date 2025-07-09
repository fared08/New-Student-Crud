<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserManagementController extends Controller
{
    // 🟢 Halaman admin dashboard
    public function index()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.dashboard', compact('users'));
    }

    // 🟢 Form tambah user
    public function create()
    {
        return view('admin.users.create');
    }

    // 🟢 Simpan user baru
    public function store(Request $request)
    {
       $validated = $request->validate([
    'name' => 'required|string|max:100',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|string|min:6|confirmed',
    'alamat' => 'nullable|string',
    'jenis_kelamin' => 'nullable|boolean',
    'agama' => 'nullable|string',
    'sekolah_asal' => 'nullable|string',
]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'alamat' => $validated['alamat'] ?? null,
            'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
            'agama' => $validated['agama'] ?? null,
            'sekolah_asal' => $validated['sekolah_asal'] ?? null,
            'role' => 'user',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil ditambahkan.');
    }

    // 🟢 Form edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // 🟢 Update user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'nullable|boolean',
            'agama' => 'nullable|string',
            'sekolah_asal' => 'nullable|string',
        ]);

        $user->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'alamat' => $validated['alamat'] ?? null,
            'jenis_kelamin' => $validated['jenis_kelamin'] ?? null,
            'agama' => $validated['agama'] ?? null,
            'sekolah_asal' => $validated['sekolah_asal'] ?? null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil diperbarui.');
    }

    // 🟢 Hapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil dihapus.');
    }
}
