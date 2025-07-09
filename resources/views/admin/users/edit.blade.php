<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit User: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4 max-w-lg">
        @csrf
        @method('PATCH')

        <div>
            <label>Nama</label>
            <input type="text" name="name" class="border w-full" value="{{ old('name', $user->name) }}">
            @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="border w-full" value="{{ old('email', $user->email) }}">
            @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Alamat</label>
            <textarea name="alamat" class="border w-full">{{ old('alamat', $user->alamat) }}</textarea>
        </div>

        <div>
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="border w-full">
                <option value="">-- Pilih --</option>
                <option value="0" {{ old('jenis_kelamin', $user->jenis_kelamin) == '0' ? 'selected' : '' }}>Laki-laki</option>
                <option value="1" {{ old('jenis_kelamin', $user->jenis_kelamin) == '1' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label>Agama</label>
            <input type="text" name="agama" class="border w-full" value="{{ old('agama', $user->agama) }}">
        </div>

        <div>
            <label>Sekolah Asal</label>
            <input type="text" name="sekolah_asal" class="border w-full" value="{{ old('sekolah_asal', $user->sekolah_asal) }}">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.dashboard') }}" class="text-gray-600">Batal</a>
    </form>
</x-app-layout>
