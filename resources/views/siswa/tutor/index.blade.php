@extends('layouts.siswa')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Tutor Kami</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($tutors as $tutor)
        <div class="border rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow">
            <div class="bg-gray-100 h-48 flex items-center justify-center">
                @if($tutor->foto)
                    <img src="{{ asset('storage/'.$tutor->foto) }}" alt="{{ $tutor->nama }}" class="h-full w-full object-cover">
                @else
                    <div class="text-gray-500 text-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p>Tidak ada foto</p>
                    </div>
                @endif
            </div>
            <div class="p-4">
                <h3 class="text-xl font-semibold">{{ $tutor->nama }}</h3>
                <p class="text-blue-600 font-medium mt-1">{{ $tutor->mata_pelajaran }}</p>
                <p class="text-gray-600 mt-2">{{ $tutor->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                <div class="mt-3 flex items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span>{{ $tutor->no_hp }}</span>
                </div>
                <div class="mt-1 flex items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>{{ $tutor->email }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
