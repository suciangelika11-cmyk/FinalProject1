<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Khotbah;
use App\Models\Jadwal;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();

        // Get jadwal mingguan (group by day)
        $jadwalData = Jadwal::where('category', 'mingguan')->get();
        $jadwalMingguan = $jadwalData->groupBy('day');

        // Get acara khusus
        $acaraKhusus = Jadwal::where('category', 'khusus')->get();

        return view('user.khotbah.khotbah', compact('khotbah', 'jadwalMingguan', 'acaraKhusus'));
    }

    public function show(Khotbah $khotbah)
    {
        return view('user.khotbah-detail', compact('khotbah'));
    }
}