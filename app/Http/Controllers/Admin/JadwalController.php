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
        $jadwal = Jadwal::latest()->get();
        return view('admin.Jadwals.index', compact('jadwal'));
    }

    public function create()
    {
        $pelayanans = Pelayanan::orderBy('judul')->get();
        return view('admin.Jadwals.create', compact('pelayanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'hari' => 'required_if:kategori,mingguan',
            'jadwal_khusus' => 'required_if:kategori,acara_khusus',
            'jam_mulai' => 'required_if:kategori,mingguan|nullable',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required',
            'deksripsi' => 'required',
            'kategori' => 'required',
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
        $pelayanans = Pelayanan::orderBy('judul')->get();
        return view('admin.Jadwals.edit', compact('Jadwal', 'pelayanans'));
    }

    public function update(Request $request, Jadwal $Jadwal)
    {
        $request->validate([
            'judul' => 'required',
            'hari' => 'required_if:kategori,mingguan',
            'jadwal_khusus' => 'required_if:kategori,acara_khusus',
            'jam_mulai' => 'required_if:kategori,mingguan|nullable',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required',
            'deksripsi' => 'required',
            'kategori' => 'required',
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