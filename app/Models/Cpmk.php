<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    protected $table = 'cpmk'; // Match the table name in the database

    protected $fillable = [
        'code',
        'description',
        'cpl_id',
        'mk_id',
        'tahun_ajaran',
        'semester',
        'validation_status',
        'validation_note'
    ];

    // Relationship with CPL
    public function cpl()
    {
        return $this->belongsTo(CPL::class, 'cpl_id');
    }

    // Relationship with MK
    public function mk()
    {
        return $this->belongsTo(MK::class, 'mk_id');
    }

    // Relationship with SubCPMK
    public function subcpmks()
    {
        return $this->hasMany(SubCPMK::class, 'cpmk_id');
    }

    // Relationship with CplMk
    public function cplMks()
    {
        return $this->hasMany(CplMk::class, 'cpmk_id');
    }

    public function penilaian()
    {
        return $this->hasMany(JenisTeknikPenilaian::class,'cpmk_id','id');
    }

    public function jenis_penilaian()
    {
        return $this->belongsToMany(JenisPenilaian::class,'jenis_teknik_penilaians');
    }
}
