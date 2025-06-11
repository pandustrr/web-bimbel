<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('siswa.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required',
            'email' => 'required|email|unique:pendaftarans,email',
            'no_hp' => 'required',
            'kelas' => 'required',
            'asal_sekolah' => 'required',
            'mata_pelajaran_diminati' => 'required',
            'alamat' => 'required',
        ]);

        Pendaftaran::create($validated);

        session(['pendaftaran_email' => $validated['email']]);

        return redirect()->route('siswa.jadwals.pilih');
    }

    public function pilihJadwal()
    {
        $jadwals = Jadwal::with('tutor')
            ->whereColumn('terdaftar', '<', 'kuota')
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->orderBy('jam_mulai')
            ->get();

        $email = session('pendaftaran_email');

        return view('siswa.pendaftaran.pilih-jadwal', compact('jadwals', 'email'));
    }

public function simpanJadwal(Request $request, $id)
{
    $request->validate(['email' => 'required|email']);

    $pendaftaran = Pendaftaran::where('email', $request->email)
        ->latest()
        ->firstOrFail();

    $jadwal = Jadwal::findOrFail($id);

    if ($jadwal->terdaftar >= $jadwal->kuota) {
        return back()->with('error', 'Kuota jadwal ini sudah penuh!');
    }

    $pendaftaran->update(['jadwal_id' => $jadwal->id]);

    $jadwal->increment('terdaftar');

    return redirect()->route('siswa.jadwals.index')
        ->with('success', 'Pendaftaran berhasil! Anda telah terdaftar di jadwal ini.');
}

}
