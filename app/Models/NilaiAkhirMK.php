<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhirMK extends Model
{    public $timestamps = false;
    protected $table = 'nilai_akhir_mk';
    protected $fillable = ['mk', 'cpl', 'cpmk', 'skor', 'total'];
}
