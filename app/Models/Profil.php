<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'phone',
        'alamat',
        'jabatan',
        'foto',
        'user_id',
    ];

    // Relasi Profil BelongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}