<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPelayanan extends Model
{
    protected $fillable = [
        'tanggal',
        'pengkhotbah',
        'tema',
        'ayat',
        'worship_team',
        'multimedia_team',
        'liturgi_team',
    ];
}