<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Mengizinkan kolom-kolom ini untuk diisi data
    protected $fillable = [
        'judul', 
        'slug', 
        'kategori', 
        'konten', 
        'gambar', 
        'status'
    ];
}