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
            'no_kk' => 'required|numeric|digits:16',
            'nama_keluarga' => 'required|string|max:50',
            'alamat_domisili' => 'required|string|max:100',
            'alamat_ktp' => 'required|string|max:100',
            'nama_lengkap' => 'required|string|max:50',
            'nik' => 'required|numeric|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'handphone' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255',
            'pekerjaan' => 'required|string|max:50',
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
            'email' => $request->email,
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