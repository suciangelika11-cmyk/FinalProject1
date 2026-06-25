<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'pemimpim',
        'deksripsi',
        'foto',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->foto ? Storage::url($this->foto) : null;
    }

    // Pelayanan.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anggotas()
    {
        return $this->hasMany(PelayananAnggota::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}