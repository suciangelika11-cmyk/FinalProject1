<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanPelayanan;
use Illuminate\Http\Request;

class KegiatanPelayananController extends Controller
{
    public function index()
    {
        $kegiatans = KegiatanPelayanan::latest()->get();
        return view('admin.KegiatanPelayan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.KegiatanPelayan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pengkhotbah' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
            'singer_team' => 'required|string|max:255',
            'worship_leader_team' => 'required|string|max:255',
            'tamborin_team' => 'required|string|max:255',
            'multimedia_team' => 'required|string|max:255',
            'musik_team' => 'required|string|max:255',
        ]);

        KegiatanPelayanan::create($request->only([
            'tanggal',
            'pengkhotbah',
            'tema',
            'ayat',
            'singer_team',
            'worship_leader_team',
            'tamborin_team',
            'multimedia_team',
            'musik_team',
        ]));

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil ditambahkan.');
    }

    public function show(KegiatanPelayanan $kegiatan)
    {
        return view('admin.KegiatanPelayan.show', compact('kegiatan'));
    }

    public function edit(KegiatanPelayanan $kegiatan)
    {
        return view('admin.KegiatanPelayan.edit', compact('kegiatan'));
    }

    public function update(Request $request, KegiatanPelayanan $kegiatan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pengkhotbah' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
            'singer_team' => 'nullable|string|max:255',
            'worship_leader_team' => 'nullable|string|max:255',
            'tamborin_team' => 'nullable|string|max:255',
            'multimedia_team' => 'nullable|string|max:255',
            'musik_team' => 'nullable|string|max:255',
        ]);

        $kegiatan->update($request->only([
            'tanggal',
            'pengkhotbah',
            'tema',
            'ayat',
            'singer_team',
            'worship_leader_team',
            'tamborin_team',
            'multimedia_team',
            'musik_team',
        ]));

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil diperbarui.');
    }

    public function destroy(KegiatanPelayanan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil dihapus.');
    }
}