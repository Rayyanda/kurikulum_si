<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrikSkalaPresepsi extends Model
{
    use HasFactory;

    protected $table = 'rubrik_skala_presepsi'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'aspek',
        'skor',
        'grade',
        'deskripsi_tambahan', // Sesuaikan dengan kolom di database
    ];
}
