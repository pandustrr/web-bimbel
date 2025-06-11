@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-6">Tambah Jadwal Les Baru</h2>

    <form action="{{ route('admin.jadwals.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="mata_pelajaran" class="block text-gray-700 mb-2">Mata Pelajaran</label>
            <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="hari" class="block text-gray-700 mb-2">Hari</label>
            <select id="hari" name="hari" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="jam_mulai" class="block text-gray-700 mb-2">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="jam_selesai" class="block text-gray-700 mb-2">Jam Selesai</label>
                <input type="time" id="jam_selesai" name="jam_selesai" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="tutor_id" class="block text-gray-700 mb-2">Tutor</label>
            <select id="tutor_id" name="tutor_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Tutor</option>
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}">{{ $tutor->nama }} - {{ $tutor->mata_pelajaran }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.jadwals.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
