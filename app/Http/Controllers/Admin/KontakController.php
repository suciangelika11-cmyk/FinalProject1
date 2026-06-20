<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();
        return view('admin.kontaks.index', compact('kontak'));
    }

    public function create()
    {
        if (Kontak::count() > 0) {
            return redirect()->route('kontak.index')
                ->with('error', 'Data kontak gereja sudah tersedia.');
        }
        return view('admin.kontaks.create');
    }

    public function store(Request $request)
    {
        if (Kontak::count() > 0) {
            return redirect()->route('kontak.index')
                ->with('error', 'Hanya boleh ada satu data kontak gereja.');
        }
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required|regex:/^[0-9]+$/',
            'email' => 'required|email',
            'jam_kerja' => 'nullable',
            'map_embed' => 'nullable',
        ], [
            'phone.regex' => 'Nomor telepon hanya boleh berisi angka.',
        ]);
        Kontak::create($request->all());
        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Kontak $kontak)
    {
        return view('admin.kontaks.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required|regex:/^[0-9]+$/',
            'email' => 'required|email',
            'jam_kerja' => 'nullable',
            'map_embed' => 'nullable',
        ], [
            'phone.regex' => 'Nomor telepon hanya boleh berisi angka.',
        ]);
        $kontak->update($request->all());
            
        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('kontak.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}