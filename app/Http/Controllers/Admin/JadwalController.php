<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['tutor', 'pendaftarans'])
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->orderBy('jam_mulai')
            ->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $tutors = Tutor::all();
        return view('admin.jadwal.create', compact('tutors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'tutor_id' => 'required|exists:tutors,id',
            'kuota' => 'required|integer|min:1|max:10'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'hari',
            'jam_mulai',
            'jam_selesai',
            'tutor_id',
            'kuota'
        ]);

        $data['terdaftar'] = 0;

        Jadwal::create($data);

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
