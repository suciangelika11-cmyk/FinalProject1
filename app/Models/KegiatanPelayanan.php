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
        'singer_team',
        'worship_leader_team',
        'tamborin_team',
        'multimedia_team',
        'musik_team',
    ];
}