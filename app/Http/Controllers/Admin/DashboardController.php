<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Tutor;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPendaftar = Pendaftaran::count();
        $jumlahTutor = Tutor::count();
        $jumlahJadwal = Jadwal::count();

        return view('admin.dashboard', compact('jumlahPendaftar', 'jumlahTutor', 'jumlahJadwal'));
    }
}
