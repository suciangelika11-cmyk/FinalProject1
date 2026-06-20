<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'deksripsi',
        'tanggal_liris',
        'foto',
        'is_active',
        'user_id',
    ];

    // Relasi Pengumuman BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}