@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-6">Edit Data Tutor</h2>

    <form action="{{ route('admin.tutors.update', $tutor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 mb-2">Nama Tutor</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $tutor->nama) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $tutor->email) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700 mb-2">No. HP</label>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $tutor->no_hp) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="mata_pelajaran" class="block text-gray-700 mb-2">Mata Pelajaran</label>
            <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', $tutor->mata_pelajaran) }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $tutor->deskripsi) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-gray-700 mb-2">Foto</label>
            @if($tutor->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$tutor->foto) }}" alt="{{ $tutor->nama }}" class="w-20 h-20 rounded-full object-cover">
                </div>
            @endif
            <input type="file" id="foto" name="foto" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.tutors.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-2 hover:bg-gray-400">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
