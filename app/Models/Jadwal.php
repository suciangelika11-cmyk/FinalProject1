<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'judul',
        'hari',
        'jadwal_khusus',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'deksripsi',
        'kategori',
        'user_id',
        'ibadah_id',
    ];

    // Relasi Jadwal BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ibadah()
    {
        return $this->belongsTo(Ibadah::class);
    }

    public function pelayans()
    {
        return $this->hasMany(Pelayanan::class, 'jadwal_id');
    }

    public static function ibadahMinggu()
    {
        return self::where('hari', 'Minggu')
            ->orderBy('jam_mulai')
            ->take(3)
            ->get();
    }
}