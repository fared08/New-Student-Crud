
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>

    <title>Dashboard</title>
</head>
<body class="bg-[#0F172A] text-gray-300 font-sans antialiased min-h-screen flex flex-col md-32">
    <header>
    <nav class="px-8 py-5 flex justify-between items-center border-b border-gray-700">
        <h1 class="text-[30px] font-bold text-white tracking-wide">Dashboard</h1>
        <div class="flex gap-3">
            @auth
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition shadow">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition shadow">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">
                    Dashboard
                </a>
                <a href="{{ route('login') }}"
                    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">
                    Register
                </a>
            @endauth
        </div>
    </nav>
</header>


 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Welcome message --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        {{ __("You're logged in!") }}
                    @else
                        {{ __("Anda melihat sebagai tamu. Silakan login untuk fitur penuh.") }}
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Table Daftar Siswa --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">
                        Daftar Siswa Terdaftar
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100 text-sm text-gray-700">
                                    <th class="border p-2">#</th>
                                    <th class="border p-2">Nama</th>
                                    <th class="border p-2">Email</th>
                                    <th class="border p-2">Alamat</th>
                                    <th class="border p-2">Jenis Kelamin</th>
                                    <th class="border p-2">Agama</th>
                                    <th class="border p-2">Sekolah Asal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="text-sm">
                                        <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border p-2">{{ $user->nama }}</td>
                                        <td class="border p-2">{{ $user->email }}</td>
                                        <td class="border p-2">{{ $user->alamat }}</td>
                                        <td class="border p-2">
                                            {{ $user->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}
                                        </td>
                                        <td class="border p-2">{{ $user->agama }}</td>
                                        <td class="border p-2">{{ $user->sekolah_asal }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="border p-4 text-center text-gray-500">
                                            Belum ada siswa terdaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>
