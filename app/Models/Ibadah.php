<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    protected $fillable = [
        'nama_sesi',
        'jam_ibadah'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Pelayanan::class);
    }
}