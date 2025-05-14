<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Rps extends Model
{
    use HasFactory;

    protected $table = 'rps';

    protected $fillable = [
        'kode_dokumen',
        'mk_id',
        'dosen_pengembang',
        'koordinator_bk',
        'kaprodi',
        'dosen_pengampu',
        'deskripsi_mk',
        'tahun_ajaran',
        'semester',
        'dekanft',
        'pustaka_utama',
        'pustaka_pendukung',
        'pra_mk_id',
        'tanggal_penyusunan'
    ];

    //relation to mk
    public function mks():BelongsToMany
    {
        return $this->belongsToMany(MK::class,'mk','id_mk','id');;
    }

    public function mk():BelongsTo
    {
        return $this->belongsTo(MK::class,'mk_id','id');
    }

    public function pra_mk()
    {
        return $this->belongsTo(MK::class,'pra_mk_id','id');
    }

    public function subcpmks()
    {
        return $this->belongsTo(Subcpmk::class,'subcpmk_id','id');
    }

    public function rpscpl()
    {
        return $this->hasMany(RpsCpl::class,'rps_id','id');
    }

    public function cpl()
    {
        return $this->through('RpsCpl')->has('cpl');
    }

    public function dsn_pengembang()
    {
        return $this->hasOne(Dosen::class,'id','dosen_pengembang');
    }
    public function dsn_dekan()
    {
        return $this->hasOne(Dosen::class,'id','dekanft');
    }
    public function dsn_kaprodi()
    {
        return $this->hasOne(Dosen::class,'id','kaprodi');
    }
    public function dsn_pengampu()
    {
        return $this->hasOne(Dosen::class,'id','dosen_pengampu');
    }

    public function jadwalRps():HasMany
    {
        return $this->hasMany(JadwalRps::class,'rps_id','id');
    }
}
