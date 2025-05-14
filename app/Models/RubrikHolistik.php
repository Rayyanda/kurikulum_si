<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubrikHolistik extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'rubrik_holistik';

    protected $fillable = [
        'grade',
        'skor',
        'kriteria_penilaian',
    ];
}
