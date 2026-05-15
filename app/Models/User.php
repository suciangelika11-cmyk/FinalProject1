<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

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
    ];

    // Relasi User HasMany Khotbah
    public function khotbahs()
    {
        return $this->hasMany(Khotbah::class);
    }

    // Relasi User HasMany Pengumuman
    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class);
    }

    // Relasi User HasMany Jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Relasi User HasMany Galeri
    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'foto_url',
        'role_label',
        'initials',
    ];

    public function getFotoUrlAttribute()
    {
        if (!empty($this->foto) && Storage::disk('public')->exists($this->foto)) {
            return Storage::url($this->foto);
        }

        return asset('images/default-user.png');
    }

    public function getRoleLabelAttribute()
    {
        return match ($this->role) {
            'admin' => 'Admin',
            'pelayan' => 'Pelayan',
            default => 'Administrator',
        };
    }

    public function getInitialsAttribute()
    {
        $name = trim($this->name ?? 'A');
        $words = preg_split('/\s+/', $name);
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }

            if (strlen($initials) >= 2) {
                break;
            }
        }

        return $initials ?: 'A';
    }
}