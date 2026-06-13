<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelayananAnggota extends Model
{
    protected $fillable = [
        'user_id',
        'pelayanan_id',
        'nama',
        'bagian',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelayanan()
    {
        return $this->belongsTo(Pelayanan::class);
    }

    public function kegiatanPelayanans()
    {
        return $this->belongsToMany(
            KegiatanPelayanan::class,
            'kegiatan_pelayanan_anggota'
        )->withPivot('peran')->withTimestamps();
    }
}