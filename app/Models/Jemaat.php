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
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'handphone',
        'pekerjaan',
        'status_pernikahan',
        'status',
        'confirmed_at',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'confirmed_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    // Jemaat memiliki banyak anggota pelayanan
    public function pelayanan_anggotas()
    {
        return $this->hasMany(PelayananAnggota::class);
    }

    // Jemaat dimiliki oleh user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}