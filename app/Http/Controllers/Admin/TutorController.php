<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::latest()->get();
        return view('admin.tutor.index', compact('tutors'));
    }

    public function create()
    {
        return view('admin.tutor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tutors,email',
            'no_hp' => 'required|string|max:15',
            'mata_pelajaran' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('tutors', 'public');
        }

        Tutor::create($validated);

        return redirect()->route('admin.tutors.index')
            ->with('success', 'Tutor berhasil ditambahkan!');
    }

    public function edit(Tutor $tutor)
    {
        return view('admin.tutor.edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tutors,email,' . $tutor->id,
            'no_hp' => 'required|string|max:15',
            'mata_pelajaran' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($tutor->foto) {
                Storage::disk('public')->delete($tutor->foto);
            }
            $validated['foto'] = $request->file('foto')->store('tutors', 'public');
        }

        $tutor->update($validated);

        return redirect()->route('admin.tutors.index')
            ->with('success', 'Data tutor berhasil diperbarui!');
    }

    public function destroy(Tutor $tutor)
    {
        if ($tutor->jadwals()->count() > 0) {
            return redirect()->route('admin.tutors.index')
                ->with('error', 'Gagal menghapus! Tutor masih memiliki jadwal yang terdaftar.');
        }

        if ($tutor->foto) {
            Storage::disk('public')->delete($tutor->foto);
        }

        $tutor->delete();

        return redirect()->route('admin.tutors.index')
            ->with('success', 'Tutor berhasil dihapus!');
    }
}
