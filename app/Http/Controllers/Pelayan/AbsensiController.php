<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\KegiatanPelayanan;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::latest()->get();
        $kegiatans = KegiatanPelayanan::latest()->get();

        return view('Pelayan.Absensi.absensi', compact('absensi', 'kegiatans'));
    }
}