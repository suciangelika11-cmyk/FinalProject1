<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $data = Tentang::first();

        return view(
            'Pelayan.TentangKami.Tentang',
            compact('data')
        );
    }
}