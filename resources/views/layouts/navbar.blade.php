    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ url('/') }}" class="text-xl font-bold">Bimbel Online</a>

                <div class="flex items-center space-x-4">
                    @if(Auth::guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Dashboard</a>
                        <a href="{{ route('admin.tutors.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Tutor</a>
                        <a href="{{ route('admin.jadwals.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Jadwal</a>
                        <a href="{{ route('admin.pendaftarans.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Pendaftaran</a>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="hover:bg-blue-700 px-3 py-2 rounded">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('beranda') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Dashboard</a>
                        <a href="{{ route('siswa.tutors.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Tutor</a>
                        <a href="{{ route('siswa.jadwals.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Jadwal</a>
                        <a href="{{ route('siswa.pendaftaran.create') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Daftar</a>
                        <a href="{{ route('admin.login') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Login Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
