<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'deksripsi',
        'foto',
        'tanggal',
        'user_id',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];
    // Relasi Galeri BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}