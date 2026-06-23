<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokokDoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'isi_pokok_doa'
    ];
}
