<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class JemaatController extends Controller
{
    public function create()
    {
        return view('User.Jemaat.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|string|max:255',
            'nama_keluarga' => 'required|string|max:255',
            'alamat_domisili' => 'required|string',
            'alamat_ktp' => 'nullable|string',
            'kolom' => 'nullable|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:255',
            'hubungan_keluarga' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki,Perempuan',
            'baptis' => 'required|in:Sudah,Belum',
            'sidi' => 'required|in:Sudah,Belum',
            'handphone' => 'nullable|string|max:20',
            'pekerjaan' => 'nullable|string|max:255',
            'tanggal_nikah' => 'nullable|date',
            'tanggal_domisili' => 'nullable|date',
            'surat_attestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->except('surat_attestasi');

            if ($request->hasFile('surat_attestasi')) {
                $data['surat_attestasi'] = $request->file('surat_attestasi')->store('attestasi', 'public');
            }

            $data['status'] = 'pending';
            $data['status'] = 'pending';
            $jemaat = Jemaat::create($data);

            DB::commit();

            return redirect()->back()
                ->with('success', 'Pendaftaran berhasil dikirim. Admin akan menerima notifikasi pendaftaran jemaat baru.');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Gagal simpan jemaat: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Data gagal disimpan. Silakan coba lagi.');
        }
    }
}