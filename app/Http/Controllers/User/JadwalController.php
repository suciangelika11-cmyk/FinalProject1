<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::orderByRaw("
            CASE hari
                WHEN 'Senin' THEN 1
                WHEN 'Selasa' THEN 2
                WHEN 'Rabu' THEN 3
                WHEN 'Kamis' THEN 4
                WHEN 'Jumat' THEN 5
                WHEN 'Sabtu' THEN 6
                WHEN 'Minggu' THEN 7
                ELSE 8
            END
        ")->orderBy('jam_mulai')->get();

        $jadwalMingguan = $jadwals->where('kategori', 'mingguan')->groupBy('hari');
        $acaraKhusus = $jadwals->where('kategori', 'acara_khusus')->values();

        return view('User.Jadwal.Jadwal', compact('jadwalMingguan', 'acaraKhusus'));
    }

    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('user.jadwal.show', compact('jadwal'));
    }
}