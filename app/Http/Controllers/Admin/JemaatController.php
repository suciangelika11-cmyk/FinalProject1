<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JemaatConfirmedMail;

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

        Mail::to($jemaat->email)
            ->send(new JemaatConfirmedMail($jemaat));

        return redirect()->route('jemaat.index')
            ->with('success', 'Pendaftaran jemaat telah dikonfirmasi dan email berhasil dikirim.');
    }

    public function destroy(Jemaat $jemaat)
    {

        $jemaat->delete();

        return back()->with(
            'success',
            'Data jemaat berhasil dihapus.'
        );
    }
}
