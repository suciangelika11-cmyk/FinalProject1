<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $galeri = Galeri::latest()->get();
        return view('admin.Galeris.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.Galeris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deksripsi' => 'required',
            'foto' => 'required|image',
            'tanggal' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('Galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function show(Galeri $Galeri)
    {
        return view('admin.Galeris.show', compact('Galeri'));
    }

    public function edit(Galeri $Galeri)
    {
        return view('admin.Galeris.edit', compact('Galeri'));
    }

    public function update(Request $request, Galeri $Galeri)
    {
        $request->validate([
            'judul' => 'required',
            'deksripsi' => 'required',
            'foto' => 'nullable|image',
            'tanggal' => 'required|date'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($Galeri->foto) {
                Storage::disk('public')->delete($Galeri->foto);
            }

            $data['foto'] = $request->file('foto')->store('Galeri', 'public');
        }

        $Galeri->update($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $Galeri)
    {
        if ($Galeri->foto) {
            Storage::disk('public')->delete($Galeri->foto);
        }

        $Galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}