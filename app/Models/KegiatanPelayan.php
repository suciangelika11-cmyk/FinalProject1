<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPelayan extends Model
{
    protected $fillable = [
        'tanggal',
        'pengkhotbah',
        'tema',
        'ayat',
        'tim_singer',
        'tim_worship_leader',
        'tim_tamborin',
        'tim_multimedia',
        'tim_musik',
    ];

    public function anggota()
    {
        return $this->hasMany(PelayananAnggota::class, 'kegiatan_pelayanan_id');
    }
}