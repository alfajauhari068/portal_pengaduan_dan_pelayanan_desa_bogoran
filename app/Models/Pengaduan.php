<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = ['nama', 'nik', 'no_wa', 'kategori', 'pesan', 'foto', 'status'];
}