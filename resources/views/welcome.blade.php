<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>

<script src="https://cdn.tailwindcss.com"></script>

<!-- @vite('resources/css/app.css') -->
</head>

<body class="bg-[#0F172A] text-gray-300 font-sans antialiased min-h-screen flex flex-col md-32">

<header>
    <nav class="px-8 py-5 flex justify-between items-center border-b border-gray-700">
        <h1 class="text-[30px] font-bold text-white tracking-wide">Penerimaan Mahasiswa Baru</h1>
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


<main class="mt-[15rem] text-center px-4 flex-1">
    <section class="max-w-3xl mx-auto">
        <h2 class="text-[60px] font-extrabold text-white leading-tight">
            Selamat Datang di Penerimaan Mahasiswa Baru
        </h2>
        <p class="mt-4 text-[20px] text-gray-400">
            Bergabunglah dengan generasi unggul. Raih masa depanmu bersama kami!
        </p>
        <a href="{{ route('register') }}"
           class="mt-6 inline-block px-6 py-3 hover:bg-black-800 bg-indigo-600 text-white text-lg rounded-lg hover:bg-indigo-700 shadow-lg transition">
            Daftar Sekarang
        </a>
    </section>

    <section class="mt-[280px] grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
        <div class="bg-[#1E293B] rounded-lg p-6 shadow hover:shadow-xl transition">
            <h3 class="text-3xl font-bold text-white">{{ $jumlahSiswa }}</h3>
            <p class="text-gray-400 mt-1">Siswa Terdaftar</p>
        </div>
        <div class="bg-[#1E293B] rounded-lg p-6 shadow hover:shadow-xl transition">
            <h3 class="text-3xl font-bold text-white">10</h3>
            <p class="text-gray-400 mt-1">Program Studi</p>
        </div>
        <div class="bg-[#1E293B] rounded-lg p-6 shadow hover:shadow-xl transition">
            <h3 class="text-3xl font-bold text-white">2025</h3>
            <p class="text-gray-400 mt-1">Tahun Akademik</p>
        </div>
    </section>

    <section class="mt-16 max-w-4xl mx-auto text-left">
        <h3 class="text-2xl font-bold text-white mb-4">Informasi Penting</h3>
        <ul class="list-disc list-inside space-y-2 text-gray-400">  
            <li>Pendaftaran: 1 Juli - 31 Agustus 2025</li>
            <li>Pengumuman hasil seleksi: 10 September 2025</li>
            <li>Persyaratan: Fotokopi ijazah, KTP, pas foto</li>
        </ul>
    </section>
</main>

<footer class="mt-20 py-6 border-t border-gray-700 text-center text-sm text-gray-500 p-4 h-full max-h-1/4">
    &copy; 2025 Penerimaan Mahasiswa Baru. All rights reserved.
</footer>

</body>
</html>
    