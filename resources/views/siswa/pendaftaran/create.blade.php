@extends('layouts.siswa')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Pendaftaran Siswa</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.pendaftaran.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama_siswa" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
            <input type="text" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700 font-medium mb-2">Nomor HP/WhatsApp</label>
            <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="kelas" class="block text-gray-700 font-medium mb-2">Kelas</label>
            <select id="kelas" name="kelas"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Kelas</option>
                <option value="SD Kelas 1-3" {{ old('kelas') == 'SD Kelas 1-3' ? 'selected' : '' }}>SD Kelas 1-3</option>
                <option value="SD Kelas 4-6" {{ old('kelas') == 'SD Kelas 4-6' ? 'selected' : '' }}>SD Kelas 4-6</option>
                <option value="SMP Kelas 7-9" {{ old('kelas') == 'SMP Kelas 7-9' ? 'selected' : '' }}>SMP Kelas 7-9</option>
                <option value="SMA Kelas 10" {{ old('kelas') == 'SMA Kelas 10' ? 'selected' : '' }}>SMA Kelas 10</option>
                <option value="SMA Kelas 11" {{ old('kelas') == 'SMA Kelas 11' ? 'selected' : '' }}>SMA Kelas 11</option>
                <option value="SMA Kelas 12" {{ old('kelas') == 'SMA Kelas 12' ? 'selected' : '' }}>SMA Kelas 12</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="asal_sekolah" class="block text-gray-700 font-medium mb-2">Asal Sekolah</label>
            <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="mata_pelajaran_diminati" class="block text-gray-700 font-medium mb-2">Mata Pelajaran yang Diminati</label>
            <textarea id="mata_pelajaran_diminati" name="mata_pelajaran_diminati" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('mata_pelajaran_diminati') }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Contoh: Matematika, Fisika, Bahasa Inggris</p>
        </div>

        <div class="mb-6">
            <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat Lengkap</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Daftar Sekarang
            </button>
        </div>
    </form>
</div>
@endsection
