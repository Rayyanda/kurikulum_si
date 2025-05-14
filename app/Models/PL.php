<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PL extends Model
{
    protected $table = 'pl';

    // Menambahkan kolom 'nama' dan 'sumber' ke fillable
    protected $fillable = ['code', 'nama', 'deskripsi', 'sumber'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pl) {
            $totalPLs = PL::count();
            $newCode = sprintf('PL-%02d', $totalPLs + 1);
            $pl->code = $newCode;
        });
    }

    public function cplPls()
    {
        return $this->belongsToMany(CPL::class, 'matrix_cpl_pl', 'pl_id', 'cpl_id');
    }
}
