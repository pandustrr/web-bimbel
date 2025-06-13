@extends('layouts.siswa')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Jadwal Les Tersedia</h2>
                <p class="text-gray-600 mt-1">Daftar lengkap jadwal les yang bisa Anda ikuti</p>
            </div>

            @if (auth()->guard('admin')->check())
                <a href="{{ route('admin.jadwals.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah Jadwal
                </a>
            @endif
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Hari</th>
                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Jam</th>
                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Tutor</th>
                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Kuota</th>
                        <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwals->groupBy('hari') as $hari => $jadwalHari)
                        @foreach ($jadwalHari as $index => $jadwal)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                @if ($index === 0)
                                    <td class="py-3 px-4 border-b font-semibold" rowspan="{{ count($jadwalHari) }}">
                                        {{ $hari }}
                                    </td>
                                @endif

                                <td class="py-3 px-4 border-b">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }} -
                                    {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                                </td>

                                <td class="py-3 px-4 border-b">
                                    {{ $jadwal->tutor->nama }}
                                </td>

                                <td class="py-3 px-4 border-b">
                                    <div class="flex items-center">
                                        <span
                                            class="{{ $jadwal->terdaftar >= $jadwal->kuota ? 'text-red-600' : 'text-green-600' }}">
                                            {{ $jadwal->terdaftar }}/{{ $jadwal->kuota }}
                                        </span>
                                        @if ($jadwal->terdaftar > 0)
                                            <button onclick="toggleModal('detailModal{{ $jadwal->id }}')"
                                                class="ml-2 text-blue-600 hover:text-blue-800 text-sm flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Detail
                                            </button>
                                        @endif
                                    </div>
                                </td>

                                <td class="py-3 px-4 border-b">
                                    <div class="flex space-x-2">
                                        @if (auth()->guard('admin')->check())
                                            <a href="{{ route('admin.jadwals.edit', $jadwal->id) }}"
                                                class="text-blue-600 hover:text-blue-800 p-1 rounded hover:bg-blue-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.jadwals.destroy', $jadwal->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin menghapus jadwal ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 p-1 rounded hover:bg-red-50">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-lg font-medium">Belum ada jadwal tersedia</p>
                                    <p class="text-gray-500 mt-1">Silakan coba lagi nanti</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($jadwals as $jadwal)
        @if ($jadwal->terdaftar > 0)
            <div id="detailModal{{ $jadwal->id }}"
                class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-10 mx-auto p-5 w-full max-w-3xl">
                    <div class="bg-white rounded-lg shadow-xl">
                        <div class="flex justify-between items-center border-b p-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Detail Peserta - {{ $jadwal->mata_pelajaran }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }} |
                                    Kuota: {{ $jadwal->terdaftar }}/{{ $jadwal->kuota }}
                                </p>
                            </div>
                            <button onclick="toggleModal('detailModal{{ $jadwal->id }}')"
                                class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-4 max-h-96 overflow-y-auto">
                            <h4 class="text-lg font-medium text-gray-900">{{ $jadwal->tutor->nama }}</h4>
                            <p class="text-sm text-gray-500">{{ $jadwal->tutor->mata_pelajaran }}</p>

                            <div class="space-y-3 mt-4">
                                @foreach ($jadwal->pendaftarans as $pendaftaran)
                                    <div class="border rounded-lg p-3 hover:bg-gray-50">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="font-medium text-gray-900">{{ $pendaftaran->nama_siswa }}</h4>
                                                <p class="text-sm text-gray-500 mt-1">
                                                    {{ $pendaftaran->asal_sekolah }} | {{ $pendaftaran->kelas }}
                                                </p>
                                            </div>
                                            <span class="text-xs text-gray-400">
                                                {{ $pendaftaran->created_at->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                        <div class="mt-2 text-sm text-gray-600">
                                            <p><span class="font-medium">Kontak:</span> {{ $pendaftaran->no_hp }} |
                                                {{ $pendaftaran->email }}</p>
                                            <p class="mt-1"><span class="font-medium">Alamat:</span>
                                                {{ $pendaftaran->alamat }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex justify-end px-4 py-3 border-t bg-gray-50">
                            <button onclick="toggleModal('detailModal{{ $jadwal->id }}')"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
