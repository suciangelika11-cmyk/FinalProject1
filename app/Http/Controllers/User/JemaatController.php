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
            'no_kk' => 'required',
            'nama_keluarga' => 'required',
            'alamat_domisili' => 'required',
            'alamat_ktp' => 'required',
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'handphone' => 'required',
            'pekerjaan' => 'required',
            'status_pernikahan' => 'required',
        ]);

        Jemaat::create([
            'no_kk' => $request->no_kk,
            'nama_keluarga' => $request->nama_keluarga,
            'alamat_domisili' => $request->alamat_domisili,
            'alamat_ktp' => $request->alamat_ktp,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'handphone' => $request->handphone,
            'pekerjaan' => $request->pekerjaan,
            'status_pernikahan' => $request->status_pernikahan,
            'status' => 'pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pendaftaran jemaat berhasil dikirim.');
    }

    public function index()
    {
        $jemaats = Jemaat::latest()->get();

        return view('admin.jemaat.index', compact('jemaats'));
    }

    public function confirm($id)
    {
        $jemaat = Jemaat::findOrFail($id);

        $jemaat->update([
            'status' => 'confirmed',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pendaftaran jemaat berhasil dikonfirmasi.');
    }
}