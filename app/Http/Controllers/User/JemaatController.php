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
            'kolom' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki,Perempuan',
            'handphone' => 'nullable|string|max:20',
            'pekerjaan' => 'nullable|string|max:255',
            'status_pernikahan' => 'required|in:Sudah Menikah,Belum Menikah',
            'status' => 'sometimes|in:pending,confirmed',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->only([
                'no_kk',
                'nama_keluarga',
                'alamat_domisili',
                'alamat_ktp',
                'kolom',
                'nama_lengkap',
                'nik',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'handphone',
                'pekerjaan',
                'status_pernikahan',
                'status',
            ]);

            $data['status'] = $data['status'] ?? 'pending';
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