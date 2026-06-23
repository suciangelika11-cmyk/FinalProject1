<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PokokDoa;
use Illuminate\Http\Request;

class PokokDoaController extends Controller
{
    public function index()
    {
        return view('user.pokokdoa.pokokdoa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'isi_pokok_doa' => 'required|max:1000',
        ]);

        PokokDoa::create([
            'nama' => $request->nama,
            'isi_pokok_doa' => $request->isi_pokok_doa,
        ]);

        return back()->with(
            'success',
            'Pokok doa berhasil dikirim.'
        );
    }
}