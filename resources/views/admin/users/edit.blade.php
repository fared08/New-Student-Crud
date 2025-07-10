<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-2xl bg-white rounded shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit User: {{ $user->name }}</h1>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    value="{{ old('name', $user->name) }}">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    value="{{ old('email', $user->email) }}">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">{{ old('alamat', $user->alamat) }}</textarea>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="">-- Pilih --</option>
                    <option value="0" {{ old('jenis_kelamin', $user->jenis_kelamin) == '0' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="1" {{ old('jenis_kelamin', $user->jenis_kelamin) == '1' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Agama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Agama</label>
                <input type="text" name="agama"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    value="{{ old('agama', $user->agama) }}">
            </div>

            {{-- Sekolah Asal --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Sekolah Asal</label>
                <input type="text" name="sekolah_asal"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                    value="{{ old('sekolah_asal', $user->sekolah_asal) }}">
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Update
                </button>
                <a href="{{ route('admin.dashboard') }}"
                    class="text-sm text-gray-600 hover:text-gray-800">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>
