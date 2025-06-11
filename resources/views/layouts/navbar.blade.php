<nav class="bg-gradient-to-r from-indigo-600 to-blue-700 text-white shadow-xl border-b border-indigo-500/30">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo/Brand -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 text-xl font-bold hover:text-blue-100 transition-colors duration-300">
                <div class="bg-white/10 backdrop-blur-sm p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <span class="bg-gradient-to-r from-blue to-blue-100 bg-clip-text ">
                    Bimbel Online
                </span>
            </a>

            <div class="flex items-center space-x-2">
                @if(Auth::guard('admin')->check())
                    <!-- Admin  -->
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('admin.dashboard') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('admin.tutors.index') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                            <span>Tutor</span>
                        </a>

                        <a href="{{ route('admin.jadwals.index') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM6 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM12 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM4 9a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V9z"/>
                            </svg>
                            <span>Jadwal</span>
                        </a>

                        <a href="{{ route('admin.pendaftarans.index') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Pendaftaran</span>
                        </a>

                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="group flex items-center space-x-2 hover:bg-red-500/20 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02] text-red-200 hover:text-red-100">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 01-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Siswa  -->
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('beranda') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('siswa.tutors.index') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                            <span>Tutor</span>
                        </a>

                        <a href="{{ route('siswa.jadwals.index') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM6 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM12 7V3a1 1 0 012 0v4a1 1 0 01-2 0zM4 9a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V9z"/>
                            </svg>
                            <span>Jadwal</span>
                        </a>

                        <a href="{{ route('siswa.pendaftaran.create') }}" class="group flex items-center space-x-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02] font-medium shadow-md shadow-blue-500/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>Daftar</span>
                        </a>

                        <a href="{{ route('admin.login') }}" class="group flex items-center space-x-2 hover:bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-[1.02] border border-white/20">
                            <svg class="w-4 h-4 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 01-1-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Login Admin</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
