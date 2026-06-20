<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pelayanan;
use App\Models\KegiatanPelayan;

class KegiatanPelayanController extends Controller
{
    public function index()
    {
        $jadwalPelayan = Jadwal::with('pelayanan')
            ->whereNotNull('pelayanan_id')
            ->orderByRaw("CASE hari
                WHEN 'Minggu' THEN 1
                WHEN 'Sabtu' THEN 2
                WHEN 'Jumat' THEN 3
                WHEN 'Kamis' THEN 4
                WHEN 'Rabu' THEN 5
                WHEN 'Selasa' THEN 6
                WHEN 'Senin' THEN 7
                ELSE 8 END")
            ->orderBy('jam_mulai')
            ->get();

        $kegiatans = KegiatanPelayan::latest()->get();

        $pelayanans = Pelayanan::latest()->get();

        return view(
            'Pelayan.KegiatanPelayan.KegiatanPelayan',
            compact('jadwalPelayan', 'pelayanans', 'kegiatans')
        );
    }
}