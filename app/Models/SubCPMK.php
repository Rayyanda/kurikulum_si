<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cpmk; // Pastikan import model Cpmk di sini

class SubCPMK extends Model
{
    protected $table = 'sub_cpmk';

    protected $fillable = [
        'code', 
        'description', 
        'cpmk_id', 
        'validation_status', 
        'validation_note', 
        'mk_id', 
        'tahun_ajaran', 
        'semester'
    ];

    // Hubungan dengan model Cpmk
    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class, 'cpmk_id');
    }

    // Hubungan dengan model MK
    public function mk()
    {
        return $this->belongsTo(MK::class, 'mk_id');
    }

    // Hubungan dengan model TransaksiSubCPMK
    public function transaksiSubCPMKs()
    {
        return $this->hasMany(TransaksiSubCPMK::class, 'subcpmk_id');
    }
}
