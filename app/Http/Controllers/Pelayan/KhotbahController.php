<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Khotbah;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();

        return view(
            'Pelayan.Khotbah.Khotbah',
            compact('khotbah')
        );
    }
}