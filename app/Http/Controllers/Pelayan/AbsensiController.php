<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::latest()->get();

        return view(
            'Pelayan.Absensi.absensi',
            compact('absensi')
        );
    }
}