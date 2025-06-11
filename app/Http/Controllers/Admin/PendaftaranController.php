<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('jadwal')->latest()->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        if ($pendaftaran->jadwal_id) {
            $pendaftaran->jadwal->decrement('terdaftar');
        }

        $pendaftaran->delete();

        return redirect()->route('admin.pendaftarans.index')
            ->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}
