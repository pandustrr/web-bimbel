@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-100 p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Jumlah Pendaftar</h3>
            <p class="text-3xl font-bold">{{ $jumlahPendaftar }}</p>
        </div>

        <div class="bg-green-100 p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Jumlah Tutor</h3>
            <p class="text-3xl font-bold">{{ $jumlahTutor }}</p>
        </div>

        <div class="bg-yellow-100 p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Jumlah Jadwal</h3>
            <p class="text-3xl font-bold">{{ $jumlahJadwal }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Selamat datang di Sistem Admin Bimbel Online</h2>
    </div>
</div>
@endsection
