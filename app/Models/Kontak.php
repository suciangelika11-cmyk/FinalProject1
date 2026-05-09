<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'address',
        'phone',
        'email',
        'office_hours',
        'map_embed',
        'user_id',
    ];

    // Relasi Kontak BelongsTo User (admin yang manage data kontak)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}