<?php

namespace App\Http\Controllers;

use App\Models\Ibadah;
use Illuminate\Http\Request;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ibadahs = Ibadah::all();

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

    /**
     * Display the specified resource.
     */
    public function show(Ibadah $ibadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ibadah $ibadah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ibadah $ibadah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibadah $ibadah)
    {
        //
    }
}
