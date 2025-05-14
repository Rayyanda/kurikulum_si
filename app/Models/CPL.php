<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CPL extends Model
{
    protected $table = 'cpl';
    protected $fillable = ['code', 'deskripsi', 'kategori'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cpl) {
            $totalCPLs = CPL::count();
            $newCode = sprintf('CPL-%02d', $totalCPLs + 1);
            $cpl->code = $newCode;
        });
    }

    public function plPls()
    {
        return $this->belongsToMany(PL::class, 'matrix_cpl_pl', 'cpl_id', 'pl_id');
    }

    public function mks()
    {
        return $this->belongsToMany(MK::class, 'cpl_mk', 'cpl_id', 'mk_id');
    }

    public function bks()
    {
        return $this->belongsToMany(BK::class, 'cpl_bk', 'cpl_id', 'bk_id');
    }

    public function cpmk():HasMany
    {
        return $this->hasMany(Cpmk::class,'cpl_id','id');
    }
}
