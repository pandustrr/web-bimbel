<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Tutor;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['tutor', 'pendaftarans'])->latest()->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $tutors = Tutor::all();
        return view('admin.jadwal.create', compact('tutors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'tutor_id' => 'required|exists:tutors,id',
            'kuota' => 'required|integer|min:1|max:10'
        ]);

        $validated['terdaftar'] = 0;

        Jadwal::create($validated);

        return redirect()->route('admin.jadwals.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit(Jadwal $jadwal)
    {
        $tutors = Tutor::all();
        return view('admin.jadwal.edit', compact('jadwal', 'tutors'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'mata_pelajaran' => 'required|string|max:255',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'tutor_id' => 'required|exists:tutors,id',
            'kuota' => 'required|integer|min:1',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.jadwals.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('admin.jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}
