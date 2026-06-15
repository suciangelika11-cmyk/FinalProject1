<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'title',
        'day',
        'jadwal_khusus',
        'start_time',
        'end_time',
        'location',
        'description',
        'category',
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
}