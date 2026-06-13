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
        'tim_singer',
        'tim_worship_leader',
        'tim_tamborin',
        'tim_multimedia',
        'tim_musik',
    ];

    public function kegiatanPelayanans()
    {
        return $this->belongsToMany(KegiatanPelayanan::class,'kegiatan_pelayanan_anggota'
        )->withPivot('peran')->withTimestamps();
    }
}