@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Edit Jadwal Les</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwals.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="mata_pelajaran" class="block font-medium">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran', $jadwal->mata_pelajaran) }}"
                class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="hari" class="block font-medium">Hari</label>
            <select name="hari" id="hari" class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                    <option value="{{ $hari }}" @selected($jadwal->hari == $hari)>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jam_mulai" class="block font-medium">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="jam_selesai" class="block font-medium">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}"
                class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="tutor_id" class="block font-medium">Tutor</label>
            <select name="tutor_id" id="tutor_id" class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach ($tutors as $tutor)
                    <option value="{{ $tutor->id }}" @selected($jadwal->tutor_id == $tutor->id)>{{ $tutor->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="kuota" class="block font-medium">Kuota Maksimal</label>
            <input type="number" name="kuota" id="kuota" value="{{ old('kuota', $jadwal->kuota) }}"
                class="w-full border border-gray-300 rounded px-3 py-2" min="1">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.jadwals.index') }}" class="mr-3 text-gray-600 hover:text-gray-800">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
