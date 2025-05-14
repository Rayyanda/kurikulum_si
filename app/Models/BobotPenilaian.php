<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotPenilaian extends Model
{
    protected $table = 'bobot_penilaian';
    public $timestamps = false; // Menonaktifkan timestamps

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'cpl_id', 'mk_id', 'cpmk_id', // Foreign keys
        'tahun_ajaran', 'semester',   // Kolom baru
        'mbkm',                      // Kolom MBKM (opsional)
        'partisipasi', 'observasi', 'untuk_kerja',
        'tes_tulis_UTS', 'tes_tulis_UAS', 'tes_lisan_Tugas_Kelompok',
        'total'                       // Kolom total
    ];

    // Relasi ke CPL
    public function cpl()
    {
        return $this->belongsTo(CPL::class, 'cpl_id');
    }

    // Relasi ke MK
    public function mk()
    {
        return $this->belongsTo(MK::class, 'mk_id');
    }

    // Relasi ke CPMK
    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class, 'cpmk_id');
    }
}
