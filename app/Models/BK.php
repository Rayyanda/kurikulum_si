<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BK extends Model
{
    protected $fillable = ['kode', 'nama_bahan_kajian', 'deskripsi','referensi'];

    protected $table = 'bk';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bk) {
            $totalBKs = BK::count();
            $bk->kode = sprintf('BK-%02d', $totalBKs + 1);
        });
    }

    public function mks()
    {
        return $this->belongsToMany(MK::class, 'bk_mk');
    }

    public function cpls()
    {
        return $this->belongsToMany(CPL::class, 'cpl_bk', 'bk_id', 'cpl_id');
    }
}
