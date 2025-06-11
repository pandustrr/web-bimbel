@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Tutor</h2>
        <a href="{{ route('admin.tutors.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Tutor
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-700">Foto</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-700">Mata Pelajaran</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tutors as $tutor)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        @if($tutor->foto)
                            <img src="{{ asset('storage/'.$tutor->foto) }}" alt="{{ $tutor->nama }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500 text-xs">No Photo</span>
                            </div>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $tutor->nama }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $tutor->mata_pelajaran }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.tutors.edit', $tutor->id) }}" class="text-blue-600 hover:text-blue-800">
                                Edit
                            </a>
                            <form action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tutor ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

