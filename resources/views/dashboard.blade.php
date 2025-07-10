<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-gray-100 min-h-screen flex flex-col">

    <header>
        <nav class="px-8 py-5 flex justify-between items-center border-b border-slate-700 bg-slate-800">
            <h1 class="text-2xl font-bold text-white tracking-wide">Dashboard</h1>
            <div class="flex gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition shadow">
                        Dashboard
                    </a>

                    @if(auth()->user()->role === 'user')
                        <a href="{{ route('profile.edit') }}"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition shadow">
                            Profil Saya
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition shadow">
                            Logout
                        </button>
                    </form>
                @else
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

    <main class="flex-1 py-10 px-6 max-w-6x1 ">
        <h2 class="text-3xl font-bold mb-6">Selamat Datang</h2>

        <div class="bg-slate-800 rounded-xl p-6 shadow text-lg ">
            @auth
                <p>Halo <span class="font-semibold">{{ auth()->user()->name }}</span>, Anda sudah login. 🎉</p>
            @else
                <p>Anda melihat sebagai tamu. Silakan login untuk fitur penuh.</p>
            @endauth
        </div>

        {{-- Grid Siswa --}}
        <section class="mt-10">
            <h3 class="text-2xl font-semibold mb-4">Daftar Siswa</h3>

            @if($users->isEmpty())
                <div class="bg-slate-700 text-slate-300 p-6 rounded-lg text-center">
                    Belum ada siswa terdaftar.
                </div>
            @else
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($users as $user)
                        <div class="bg-slate-800 rounded-lg shadow p-4 hover:shadow-lg transition">
                            <h4 class="text-xl font-semibold text-white">{{ $user->name }}</h4>
                            <p class="text-slate-400 text-sm">{{ $user->email }}</p>
                            <div class="mt-2 text-sm space-y-1">
                                <p><span class="font-medium">Alamat:</span> {{ $user->alamat ?? '-' }}</p>
                                <p><span class="font-medium">Jenis Kelamin:</span> {{ $user->jenis_kelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</p>
                                <p><span class="font-medium">Agama:</span> {{ $user->agama ?? '-' }}</p>
                                <p><span class="font-medium">Sekolah Asal:</span> {{ $user->sekolah_asal ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

</body>
</html>
