<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tambah User Baru</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    
    <div class="w-full max-w-2xl bg-white rounded shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah User Baru</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('nama') }}">
                @error('nama') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('email') }}">
                @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="2"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('alamat') }}</textarea>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">-- Pilih --</option>
                    <option value="0" {{ old('jenis_kelamin') == '0' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Agama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                <input type="text" name="agama"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('agama') }}">
            </div>

            {{-- Sekolah Asal --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sekolah Asal</label>
                <input type="text" name="sekolah_asal"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('sekolah_asal') }}">
            </div>

            <div class="flex items-center justify-between mt-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Simpan
                </button>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm text-gray-600 hover:text-gray-800">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
