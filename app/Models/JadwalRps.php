<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalRps extends Model
{
    use HasFactory;

    protected $table = 'jadwal_rps';
    protected $fillable = [
        'rps_id',
        'minggu_ke',
        'sub_cpmk_id',
        'indikator',
        'bentuk_pembelajaran',
        'metode_pembelajaran',
        'materi_pembelajaran',
        'bobot_penilaian'
    ];

    public  function rps()
    {
        return $this->belongsTo(Rps::class,'rps_id','id');
    }

    public function sub_cpmk()
    {
        return $this->hasOne(SubCPMK::class,'id','sub_cpmk_id');
    }

    public function kriteria()
    {
        return $this->hasMany(RubrikRps::class,'jadwalrps_id','id');
    }

    public function rubrikrps()
    {
        return $this->hasOne(RubrikRps::class,'jadwalrps_id','id');
    }

}
