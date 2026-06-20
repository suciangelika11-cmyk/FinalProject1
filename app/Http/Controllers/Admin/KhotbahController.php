<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Khotbah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();
        return view('admin.khotbah.index', compact('khotbah'));
    }

    public function create()
    {
        return view('admin.khotbah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'video' => 'required|string|max:255',
            'deksripsi' => 'required|string',
            'thumbnail' => 'required|image|max:2048',
            'tanggal_khotbah' => 'required|date',
        ]);

        $data = $request->only(['judul', 'video', 'deksripsi', 'tanggal_khotbah']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('khotbah', 'public');
        }

        Khotbah::create($data);

        return redirect()->route('khotbah.index')->with('success', 'Khotbah berhasil ditambahkan');
    }

    public function edit(Khotbah $khotbah)
    {
        return view('admin.khotbah.edit', compact('khotbah'));
    }

    public function update(Request $request, Khotbah $khotbah)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'video' => 'required|string|max:255',
            'deksripsi' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'tanggal_khotbah' => 'required|date',
        ]);

        $data = $request->only(['title', 'video', 'deksripsi', 'tanggal_khotbah']);

        if ($request->hasFile('thumbnail')) {
            if ($khotbah->thumbnail && Storage::disk('public')->exists($khotbah->thumbnail)) {
                Storage::disk('public')->delete($khotbah->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('khotbah', 'public');
        }

        $khotbah->update($data);

        return redirect()->route('khotbah.index')->with('success', 'Khotbah berhasil diperbarui');
    }

    public function destroy(Khotbah $khotbah)
    {
        if ($khotbah->thumbnail && Storage::disk('public')->exists($khotbah->thumbnail)) {
            Storage::disk('public')->delete($khotbah->thumbnail);
        }

        $khotbah->delete();

        return redirect()->route('khotbah.index')->with('success', 'Khotbah berhasil dihapus');
    }
}