<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KegiatanPelayanan;

class KegiatanPelayananController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanPelayanan::latest()->get();

        return view('kegiatan-pelayanan', compact('kegiatan'));
    }

    public function create()
    {
        return view('KegiatanPelayanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'pengkhotbah' => 'required',
            'tema' => 'required',
            'ayat' => 'required',
        ]);

        KegiatanPelayanan::create([

            'tanggal' => $request->tanggal,

            'pengkhotbah' => $request->pengkhotbah,

            'tema' => $request->tema,

            'ayat' => $request->ayat,

            'worship_team' => $request->worship_team,

            'multimedia_team' => $request->multimedia_team,

            'liturgi_team' => $request->liturgi_team,
        ]);

        return redirect()
            ->route('kegiatan-pelayanan.index')
            ->with('success', 'Berhasil tambah kegiatan');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanPelayanan::findOrFail($id);

        return view('KegiatanPelayanan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanPelayanan::findOrFail($id);

        $kegiatan->update([

            'tanggal' => $request->tanggal,

            'pengkhotbah' => $request->pengkhotbah,

            'tema' => $request->tema,

            'ayat' => $request->ayat,

            'worship_team' => $request->worship_team,

            'multimedia_team' => $request->multimedia_team,

            'liturgi_team' => $request->liturgi_team,
        ]);

        return redirect()
            ->route('kegiatan-pelayanan.index')
            ->with('success', 'Berhasil update kegiatan');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanPelayanan::findOrFail($id);

        $kegiatan->delete();

        return redirect()
            ->route('kegiatan-pelayanan.index')
            ->with('success', 'Berhasil hapus kegiatan');
    }
}