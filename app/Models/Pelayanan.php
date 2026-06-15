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
        'title',
        'category',
        'leader',
        'description',
        'photo',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
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
}