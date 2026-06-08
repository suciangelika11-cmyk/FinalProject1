<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pelayanan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('pelayanan')->get();
        return view('admin.Jadwals.index', compact('jadwal'));
    }

    public function create()
    {
        $pelayanans = Pelayanan::orderBy('title')->get();
        return view('admin.Jadwals.create', compact('pelayanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'day' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required',
            'description' => 'required',
            'category' => 'required',
            'pelayanan_id' => 'nullable|exists:pelayanan,id'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show(Jadwal $Jadwal)
    {
        return view('admin.Jadwals.show', compact('Jadwal'));
    }

    public function edit(Jadwal $Jadwal)
    {
        $pelayanans = Pelayanan::orderBy('title')->get();
        return view('admin.Jadwals.edit', compact('Jadwal', 'pelayanans'));
    }

    public function update(Request $request, Jadwal $Jadwal)
    {
        $request->validate([
            'title' => 'required',
            'day' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'required',
            'description' => 'required',
            'category' => 'required',
            'pelayanan_id' => 'nullable|exists:pelayanan,id'
        ]);

        $Jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwal $Jadwal)
    {
        $Jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}