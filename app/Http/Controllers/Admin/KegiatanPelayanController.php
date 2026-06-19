<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanPelayan;
use Illuminate\Http\Request;

class KegiatanPelayanController extends Controller
{
    public function index()
    {
        $kegiatans = KegiatanPelayan::latest()->get();
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
            'tim_singer' => 'required|string|max:255',
            'tim_worship_leader' => 'required|string|max:255',
            'tim_tamborin' => 'required|string|max:255',
            'tim_multimedia' => 'required|string|max:255',
            'tim_musik' => 'required|string|max:255',
        ]);

        KegiatanPelayan::create($request->only([
            'tanggal',
            'pengkhotbah',
            'tema',
            'ayat',
            'tim_singer',
            'tim_worship_leader',
            'tim_tamborin',
            'tim_multimedia',
            'tim_musik',
        ]));

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil ditambahkan.');
    }

    public function show(KegiatanPelayan $kegiatan)
    {
        return view('admin.KegiatanPelayan.show', compact('kegiatan'));
    }

    public function edit(KegiatanPelayan $kegiatan)
    {
        return view('admin.KegiatanPelayan.edit', compact('kegiatan'));
    }

    public function update(Request $request, KegiatanPelayan $kegiatan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pengkhotbah' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
            'tim_singer' => 'nullable|string|max:255',
            'tim_worship_leader' => 'nullable|string|max:255',
            'tim_tamborin' => 'nullable|string|max:255',
            'tim_multimedia' => 'nullable|string|max:255',
            'tim_musik' => 'nullable|string|max:255',
        ]);

        $kegiatan->update($request->only([
            'tanggal',
            'pengkhotbah',
            'tema',
            'ayat',
            'tim_singer',
            'tim_worship_leader',
            'tim_tamborin',
            'tim_multimedia',
            'tim_musik',
        ]));

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil diperbarui.');
    }

    public function destroy(KegiatanPelayan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')
            ->with('success', 'Kegiatan pelayanan berhasil dihapus.');
    }
}