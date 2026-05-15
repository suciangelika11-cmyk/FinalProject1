<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pengumuman;

class JadwalIbadahController extends Controller
{
    public function index()
    {
        $jadwalMingguan = Jadwal::get()
            ->groupBy('day')
            ->mapWithKeys(function ($group, $day) {
                return [$day => $group];
            });

        $acaraKhusus = Pengumuman::get();

        return view(
            'Pelayan.jadwal_ibadah.jadwalibadah',
            compact('jadwalMingguan', 'acaraKhusus')
        );
    }
}