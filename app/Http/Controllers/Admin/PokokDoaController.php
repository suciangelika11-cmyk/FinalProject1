<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PokokDoa;

class PokokDoaController extends Controller
{
    public function index()
    {
        $pokokDoas = PokokDoa::latest()->get();

        $totalDoa = PokokDoa::count();

        $bulanIni = PokokDoa::whereMonth(
            'created_at',
            now()->month
        )->count();

        $hariIni = PokokDoa::whereDate(
            'created_at',
            today()
        )->count();

        return view(
            'admin.pokokdoa.index',
            compact(
                'pokokDoas',
                'totalDoa',
                'bulanIni',
                'hariIni'
            )
        );
    }
}