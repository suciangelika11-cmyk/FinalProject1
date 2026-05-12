<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentang';

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'gembala_nama',
        'gembala_jabatan',
        'gembala_deskripsi',
        'gembala_foto',
        'user_id',
    ];

    // Relasi Tentang BelongsTo User (admin yang manage data tentang)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}