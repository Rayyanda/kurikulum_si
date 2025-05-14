<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrikAnalitik extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai
    protected $table = 'rubrik_analitik'; // Pastikan nama tabel di sini sesuai dengan yang ada di database

    protected $fillable = [
        'aspek',
        'skor',
        'grade',
        'deskripsi_tambahan',
    ];
}
