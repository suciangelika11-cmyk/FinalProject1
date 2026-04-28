<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    public function index()
    {
        $jemaats = Jemaat::latest()->get();

        return view('admin.jemaat.index', compact('jemaats'));
    }

    public function confirm(Jemaat $jemaat)
    {
        $jemaat->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);

        return redirect()->route('jemaat.index')
            ->with('success', 'Pendaftaran jemaat telah dikonfirmasi.');
    }
}
