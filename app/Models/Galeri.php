<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Mengizinkan kolom judul (caption) dan gambar untuk diisi ke database
    protected $fillable = [
        'judul', 
        'gambar',
        'status'
        
    ];
}