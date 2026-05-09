<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'nama_keluarga',
        'alamat_domisili',
        'alamat_ktp',
        'kolom',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'handphone',
        'pekerjaan',
        'status_pernikahan',
        'status',
    ];

    // Relasi Jemaat HasMany PelayananAnggota
    public function pelayanan_anggotas()
    {
        return $this->hasMany(PelayananAnggota::class);
    }

    // Relasi Jemaat BelongsTo User (jika ada user account untuk jemaat)
    // Relasi Jemaat BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}