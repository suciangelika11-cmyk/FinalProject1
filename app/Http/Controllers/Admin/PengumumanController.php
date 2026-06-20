<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deksripsi' => 'required|string',
            'tanggal_liris' => 'required|date',
            'foto' => 'required|image|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->only([
            'judul',
            'deksripsi',
            'publish_date',
            'is_active',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengumuman', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deksripsi' => 'required|string',
            'tanggal_liris' => 'required|date',
            'foto' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->only([
            'judul',
            'deksripsi',
            'tanggal_liris',
            'is_active',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengumuman->foto && Storage::disk('public')->exists($pengumuman->foto)) {
                Storage::disk('public')->delete($pengumuman->foto);
            }

            $data['foto'] = $request->file('foto')->store('pengumuman', 'public');
        }

        $pengumuman->update($data);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->foto && Storage::disk('public')->exists($pengumuman->foto)) {
            Storage::disk('public')->delete($pengumuman->foto);
        }

        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}