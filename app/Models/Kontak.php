<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'alamat',
        'no_hp',
        'email',
        'jam_kerja',
        'map',
        'user_id',
    ];

    // Relasi Kontak BelongsTo User (admin yang manage data kontak)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}