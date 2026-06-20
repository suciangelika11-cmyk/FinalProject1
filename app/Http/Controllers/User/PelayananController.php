<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanans = Pelayanan::with('anggotas')->latest()->get();

        $kepemimpinan = $pelayanans->where('kategori', 'kepemimpinan')->values();
        $timPelayanan = $pelayanans->where('kategori', 'tim')->values();
        $fotoPelayanan = $pelayanans->where('kategori', 'aksi')->values();

        return view('User.Pelayanan.Pelayanan', compact('kepemimpinan', 'timPelayanan', 'fotoPelayanan'));
    }
}