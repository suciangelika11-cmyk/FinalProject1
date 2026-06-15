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
            'category' => 'required|in:kepemimpinan,tim,aksi',

            'title_kepemimpinan' => 'required_if:category,kepemimpinan|nullable|string|max:255',
            'leader_kepemimpinan' => 'required_if:category,kepemimpinan|nullable|string|max:255',

            'title_tim' => 'required_if:category,tim|nullable|string|max:255',
            'description_tim' => 'required_if:category,tim|nullable|string',

            'title_aksi' => 'required_if:category,aksi|nullable|string|max:255',
            'description_aksi' => 'required_if:category,aksi|nullable|string',

            'photo' => 'nullable|image|max:2048',

            'anggota_nama.*' => 'nullable|string|max:100',
            'anggota_bagian.*' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {
            if ($request->category == 'kepemimpinan') {
                $data = [
                    'title' => $request->title_kepemimpinan,
                    'category' => 'kepemimpinan',
                    'leader' => $request->leader_kepemimpinan,
                    'description' => null,
                ];
            } elseif ($request->category == 'tim') {
                $data = [
                    'title' => $request->title_tim,
                    'category' => 'tim',
                    'leader' => null,
                    'description' => $request->description_tim,
                ];
            } else {
                $data = [
                    'title' => $request->title_aksi,
                    'category' => 'aksi',
                    'leader' => null,
                    'description' => $request->description_aksi,
                ];
            }

            if ($request->category == 'kepemimpinan' && $request->hasFile('photo_kepemimpinan')) {
                $data['photo'] = $request->file('photo_kepemimpinan')->store('pelayanan', 'public');
            }

            if ($request->category == 'aksi' && $request->hasFile('photo_aksi')) {
                $data['photo'] = $request->file('photo_aksi')->store('pelayanan', 'public');
            }

            $data['user_id'] = auth()->id();

            $pelayanan = Pelayanan::create($data);

            if ($request->category == 'tim' && $request->has('anggota_nama')) {
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
            'category' => 'required|in:kepemimpinan,tim,aksi',

            'title_kepemimpinan' => 'required_if:category,kepemimpinan|nullable|string|max:255',
            'leader_kepemimpinan' => 'required_if:category,kepemimpinan|nullable|string|max:255',

            'title_tim' => 'required_if:category,tim|nullable|string|max:255',
            'description_tim' => 'required_if:category,tim|nullable|string',

            'title_aksi' => 'required_if:category,aksi|nullable|string|max:255',
            'description_aksi' => 'required_if:category,aksi|nullable|string',

            'photo_kepemimpinan' => 'nullable|image|max:2048',
            'photo_aksi' => 'nullable|image|max:2048',

            'anggota_nama.*' => 'nullable|string|max:100',
            'anggota_bagian.*' => 'nullable|string|max:100',
        ]);

        DB::beginTransaction();

        try {
            if ($request->category == 'kepemimpinan') {
                $data = [
                    'title' => $request->title_kepemimpinan,
                    'category' => 'kepemimpinan',
                    'leader' => $request->leader_kepemimpinan,
                    'description' => null,
                ];
            } elseif ($request->category == 'tim') {
                $data = [
                    'title' => $request->title_tim,
                    'category' => 'tim',
                    'leader' => null,
                    'description' => $request->description_tim,
                    'photo' => null,
                ];
            } else {
                $data = [
                    'title' => $request->title_aksi,
                    'category' => 'aksi',
                    'leader' => null,
                    'description' => $request->description_aksi,
                ];
            }

            if ($request->hasFile('photo')) {
                if ($pelayanan->photo && Storage::disk('public')->exists($pelayanan->photo)) {
                    Storage::disk('public')->delete($pelayanan->photo);
                }

                $data['photo'] = $request->file('photo')->store('pelayanan', 'public');
            }

            $pelayanan->update($data);

            $pelayanan->anggotas()->delete();

            if ($request->category == 'tim' && $request->has('anggota_nama')) {
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
        if ($pelayanan->photo && Storage::disk('public')->exists($pelayanan->photo)) {
            Storage::disk('public')->delete($pelayanan->photo);
        }

        $pelayanan->anggotas()->delete();

        $pelayanan->delete();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil dihapus');
    }
}