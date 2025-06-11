<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        return view('siswa.beranda');
    }
}
