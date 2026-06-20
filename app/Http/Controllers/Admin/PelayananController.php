<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use App\Models\PelayananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanan = Pelayanan::with('user', 'anggotas')->latest()->get();

        return view('admin.pelayanan.index', compact('pelayanan'));
    }

    public function create()
    {
        return view('admin.pelayanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:kepemimpinan,tim,aksi',
            'judul_kepemimpinan' => 'required_if:kategori,kepemimpinan|nullable|string|max:255',
            'pemimpim_kepemimpinan' => 'required_if:kategori,kepemimpinan|nullable|string|max:255',
            'judul_tim' => 'required_if:kategori,tim|nullable|string|max:255',
            'deksripsi_tim' => 'required_if:kategori,tim|nullable|string',
            'judul_aksi' => 'required_if:kategori,aksi|nullable|string|max:255',
            'deksripsi_aksi' => 'required_if:kategori,aksi|nullable|string',
            'foto' => 'nullable|image|max:2048',
            'anggota_nama.*' => 'nullable|string|max:100',
            'anggota_bagian.*' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {
            if ($request->kategori == 'kepemimpinan') {
                $data = [
                    'judul' => $request->judul_kepemimpinan,
                    'kategori' => 'kepemimpinan',
                    'pemimpim' => $request->pemimpim_kepemimpinan,
                    'deksripsi' => null,
                ];
            } elseif ($request->kategori == 'tim') {
                $data = [
                    'judul' => $request->judul_tim,
                    'kategori' => 'tim',
                    'pemimpim' => null,
                    'deksripsi' => $request->deksripsi_tim,
                ];
            } else {
                $data = [
                    'judul' => $request->judul_aksi,
                    'kategori' => 'aksi',
                    'pemimpim' => null,
                    'deksripsi' => $request->deksripsi_aksi,
                ];
            }

            if ($request->kategori == 'kepemimpinan' && $request->hasFile('foto_kepemimpinan')) {
                $data['foto'] = $request->file('foto_kepemimpinan')->store('pelayanan', 'public');
            }

            if ($request->kategori == 'aksi' && $request->hasFile('foto_aksi')) {
                $data['foto'] = $request->file('foto_aksi')->store('pelayanan', 'public');
            }

            $data['user_id'] = auth()->id();

            $pelayanan = Pelayanan::create($data);

            if ($request->kategori == 'tim' && $request->has('anggota_nama')) {
                foreach ($request->anggota_nama as $index => $nama) {
                    $bagian = $request->anggota_bagian[$index] ?? null;

                    if (!empty($nama)) {
                        PelayananAnggota::create([
                            'pelayanan_id' => $pelayanan->id,
                            'nama' => $nama,
                            'bagian' => $bagian,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('pelayanan.index')
                ->with('success', 'Data pelayanan berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit(Pelayanan $pelayanan)
    {
        $pelayanan->load('anggotas');

        return view('admin.pelayanan.edit', compact('pelayanan'));
    }

    public function update(Request $request, Pelayanan $pelayanan)
    {
        $request->validate([
            'kategori' => 'required|in:kepemimpinan,tim,aksi',
            'judul_kepemimpinan' => 'required_if:kategori,kepemimpinan|nullable|string|max:255',
            'pemimpim_kepemimpinan' => 'required_if:kategori,kepemimpinan|nullable|string|max:255',
            'judul_tim' => 'required_if:kategori,tim|nullable|string|max:255',
            'deksripsi_tim' => 'required_if:kategori,tim|nullable|string',
            'judul_aksi' => 'required_if:kategori,aksi|nullable|string|max:255',
            'deksripsi_aksi' => 'required_if:kategori,aksi|nullable|string',
            'foto' => 'nullable|image|max:2048',
            'anggota_nama.*' => 'nullable|string|max:100',
            'anggota_bagian.*' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {
            if ($request->kategori == 'kepemimpinan') {
                $data = [
                    'judul' => $request->judul_kepemimpinan,
                    'kategori' => 'kepemimpinan',
                    'pemimpim' => $request->pemimpim_kepemimpinan,
                    'deksripsi' => null,
                ];
            } elseif ($request->kategori == 'tim') {
                $data = [
                    'judul' => $request->judul_tim,
                    'kategori' => 'tim',
                    'pemimpim' => null,
                    'deksripsi' => $request->deksripsi_tim,
                    'photo' => null,
                ];
            } else {
                $data = [
                    'judul' => $request->judul_aksi,
                    'kategori' => 'aksi',
                    'pemimpim' => null,
                    'deksripsi' => $request->deksripsi_aksi,
                ];
            }

            if ($request->hasFile('foto')) {
                if ($pelayanan->foto && Storage::disk('public')->exists($pelayanan->foto)) {
                    Storage::disk('public')->delete($pelayanan->foto);
                }

                $data['foto'] = $request->file('foto')->store('pelayanan', 'public');
            }

            $pelayanan->update($data);

            $pelayanan->anggotas()->delete();

            if ($request->kategori == 'tim' && $request->has('anggota_nama')) {
                foreach ($request->anggota_nama as $index => $nama) {
                    $bagian = $request->anggota_bagian[$index] ?? null;

                    if (!empty($nama)) {
                        PelayananAnggota::create([
                            'pelayanan_id' => $pelayanan->id,
                            'nama' => $nama,
                            'bagian' => $bagian,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('pelayanan.index')
                ->with('success', 'Data pelayanan berhasil diperbarui');
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy(Pelayanan $pelayanan)
    {
        if ($pelayanan->foto && Storage::disk('public')->exists($pelayanan->foto)) {
            Storage::disk('public')->delete($pelayanan->foto);
        }

        $pelayanan->anggotas()->delete();

        $pelayanan->delete();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil dihapus');
    }
}