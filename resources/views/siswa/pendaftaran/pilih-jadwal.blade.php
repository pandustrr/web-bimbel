@extends('layouts.siswa')

@section('content')
<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pilih Jadwal Les</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-50">
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Tutor</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Hari</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Jam</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Kuota</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->tutor->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->hari }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                        <td class="py-2 px-4 border-b">{{ $jadwal->terdaftar }}/{{ $jadwal->kuota }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('siswa.jadwals.simpan', $jadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin memilih jadwal ini?')">
                                @csrf
                                <input type="hidden" name="email" value="{{ session('pendaftaran_email') }}">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Pilih
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('siswa.pendaftaran.create') }}" class="text-gray-600 hover:underline">&larr; Kembali ke Formulir</a>
    </div>
</div>
@endsection
