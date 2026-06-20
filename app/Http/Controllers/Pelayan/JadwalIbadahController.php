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
            ->groupBy('hari')
            ->mapWithKeys(function ($group, $hari) {
                return [$hari => $group];
            });

        $acaraKhusus = Pengumuman::get();

        return view(
            'Pelayan.Jadwal.jadwal',
            compact('jadwalMingguan', 'acaraKhusus')
        );
    }

    
}