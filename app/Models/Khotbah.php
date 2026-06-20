<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Khotbah extends Model
{
    use HasFactory;

    protected $table = 'khotbah';

    protected $fillable = [
        'judul',
        'video',
        'deksripsi',
        'thumbnail',
        'tanggal_khotbah',
        'user_id',
    ];

    protected $casts = [
        'tanggal_khotbah' => 'datetime',
    ];

    // Relasi Khotbah BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : null;
    }
}