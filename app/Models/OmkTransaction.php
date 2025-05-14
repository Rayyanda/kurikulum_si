<?php

// app/Models/OmkTransaction.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OmkTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'sks',
        'jumlah_mk',
        'mk_wajib',
        'mk_pilihan',
        'mk_wajib_umum',
    ];
}
