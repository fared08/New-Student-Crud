<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0px">
<header>
    <nav class="px-8 py-5 flex justify-between items-center border-b border-gray-700 bg-gray-900">
        <h1 class="text-[30px] font-bold text-white tracking-wide">Admin Dashboard</h1>
        <div class="flex gap-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition shadow">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</header>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-8x2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as admin!") }}
                </div>
            </div>
        </div>
    </div>

    {{-- Table Siswa dengan aksi --}}
    <div class="py-6">
        <div class="max-w-8x2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">
                        Daftar Siswa
                        <a href="{{ route('admin.users.create') }}" class="ml-4 px-3 py-1 bg-green-600 text-white rounded">+ Tambah</a>
                    </h3>

                    <table class="min-w-full table-auto border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border">#</th>
                                <th class="p-2 border">Nama</th>
                                <th class="p-2 border">Email</th>
                                <th class="p-2 border">Alamat</th>
                                <th class="p-2 border">Jenis Kelamin</th>
                                <th class="p-2 border">Agama</th>
                                <th class="p-2 border">Sekolah Asal</th>
                                <th class="p-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="p-2 border">{{ $loop->iteration }}</td>
                                    <td class="p-2 border">{{ $user->name }}</td>
                                    <td class="p-2 border">{{ $user->email }}</td>
                                    <td class="p-2 border">{{ $user->alamat ?? '-' }}</td>
                                    <td class="p-2 border">
                                        {{ $user->jenis_kelamin === 0 ? 'Laki-laki' : ($user->jenis_kelamin === 1 ? 'Perempuan' : '-') }}
                                    </td>
                                    <td class="p-2 border">{{ $user->agama ?? '-' }}</td>
                                    <td class="p-2 border">{{ $user->sekolah_asal ?? '-' }}</td>
                                    <td class="p-2 border">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600">Edit</a> |
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center p-4 text-gray-500">Tidak ada siswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</body>
</html>
