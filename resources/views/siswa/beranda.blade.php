@extends('layouts.siswa')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-600 mb-2">Selamat Datang di Bimbel Online</h1>
        <p class="text-lg text-gray-600">Raih prestasi akademik lebih baik dengan bimbingan tutor berpengalaman kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
            <div class="text-blue-600 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Tutor Berkualitas</h3>
            <p class="text-gray-600">Belajar dari tutor yang ahli di bidangnya dengan metode pengajaran terbaik.</p>
            <a href="{{ route('siswa.tutors.index') }}" class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-medium">Lihat Daftar Tutor →</a>
        </div>

        <div class="bg-green-50 p-6 rounded-lg border border-green-100">
            <div class="text-green-600 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Jadwal Fleksibel</h3>
            <p class="text-gray-600">Pilih jadwal belajar sesuai waktu luang Anda dengan berbagai pilihan hari.</p>
            <a href="{{ route('siswa.jadwals.index') }}" class="inline-block mt-3 text-green-600 hover:text-green-800 font-medium">Lihat Jadwal →</a>
        </div>

        <div class="bg-purple-50 p-6 rounded-lg border border-purple-100">
            <div class="text-purple-600 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Garansi Kepuasan</h3>
            <p class="text-gray-600">Kami menjamin peningkatan pemahaman materi dan nilai akademik siswa.</p>
            <a href="{{ route('siswa.pendaftaran.create') }}" class="inline-block mt-3 text-purple-600 hover:text-purple-800 font-medium">Daftar Sekarang →</a>
        </div>
    </div>

    <div class="bg-blue-600 text-white p-6 rounded-lg">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0">
                <h2 class="text-xl font-bold mb-2">Siap Bergabung Dengan Kami?</h2>
                <p class="opacity-90">Daftar sekarang dan dapatkan pengalaman belajar terbaik!</p>
            </div>
            <a href="{{ route('siswa.pendaftaran.create') }}" class="bg-white text-blue-600 px-6 py-2 rounded font-semibold hover:bg-gray-100 transition">
                Daftar Sekarang
            </a>
        </div>
    </div>
</div>
@endsection
