<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::latest()->first();
        return view('admin.tentang.index', compact('tentang'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('gembala_foto')) {
            $input['gembala_foto'] = $request->file('gembala_foto')->store('tentang', 'public');
        }

        Tentang::create($input);

        return redirect()->route('tentang.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Tentang $tentang)
    {
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'gembala_nama' => 'required|string|max:255',
            'gembala_jabatan' => 'required|string|max:255',
            'gembala_deskripsi' => 'required|string',
            'gembala_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'sejarah',
            'visi',
            'misi',
            'gembala_nama',
            'gembala_jabatan',
            'gembala_deskripsi',
        ]);

        if ($request->hasFile('gembala_foto')) {
            if ($tentang->gembala_foto && Storage::disk('public')->exists($tentang->gembala_foto)) {
                Storage::disk('public')->delete($tentang->gembala_foto);
            }

            $data['gembala_foto'] = $request->file('gembala_foto')->store('tentang', 'public');
        }

        $tentang->update($data);

        return redirect()->route('tentang.index')->with('success', 'Data Tentang berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        if ($tentang->gembala_foto && Storage::disk('public')->exists($tentang->gembala_foto)) {
            Storage::disk('public')->delete($tentang->gembala_foto);
        }

        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data Tentang berhasil dihapus.');
    }
}