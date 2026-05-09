<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::latest()->get();
        return view('admin.Absensi.index', compact('absensi'));
    }

    public function create()
    {
        return view('admin.Absensi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'session' => 'required|string|max:100',
            'pengkhotbah' => 'required|string|max:255',
            'pelayan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        $data['created_by'] = auth()->id();

        Absensi::create($data);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    public function edit(Absensi $absensi)
    {
        return view('admin.Absensi.edit', compact('absensi'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'session' => 'required|string|max:100',
            'pengkhotbah' => 'required|string|max:255',
            'pelayan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        $absensi->update($data);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
