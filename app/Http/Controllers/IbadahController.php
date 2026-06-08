<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibadahs = Jadwal::where('day', 'Minggu')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        return view('welcome', compact('ibadahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
