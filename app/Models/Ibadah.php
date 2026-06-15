<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    protected $fillable = [
        'user_id',
        'nama_sesi',
        'jam_ibadah'
    ];


    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);

    }
}