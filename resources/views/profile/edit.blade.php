<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- Update Profile --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                            @csrf
                            @method('PATCH')

                            {{-- Name --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" name="name"
                                    class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"
                                    value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email"
                                    class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"
                                    value="{{ old('email', auth()->user()->email) }}">
                            </div>

                            {{-- Alamat --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <input type="text" name="alamat"
                                    class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"
                                    value="{{ old('alamat', auth()->user()->alamat) }}">
                            </div>

                            {{-- Sekolah Asal --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sekolah Asal</label>
                                <input type="text" name="sekolah_asal"
                                    class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm"
                                    value="{{ old('sekolah_asal', auth()->user()->sekolah_asal) }}">
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                                <select name="jenis_kelamin"
                                    class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                    <option value="">-- Pilih --</option>
                                    <option value="0" {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == '0' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="1" {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == '1' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete User --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                {{-- Back to Dashboard --}}
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <a href="{{ route('dashboard') }}"
                            class="inline-block px-4 py-2 bg-gray-900 shadow text-white rounded-lg hover:bg-gray-700">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
