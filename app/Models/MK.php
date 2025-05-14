<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MK extends Model
{
    protected $table = 'mk';
    protected $fillable = [
        'kode', 'nama', 'sks', 'semester', 'kategori', 'parent_id'
    ];

    // Define relationships

    // Many-to-many relationship with BK (assuming BK model exists)
    public function bks()
    {
        return $this->belongsToMany(BK::class, 'bk_mk', 'mk_id', 'bk_id');
    }

    // Many-to-many relationship with CPL (assuming CPL model exists)
    public function cpls()
    {
        return $this->belongsToMany(CPL::class, 'cpl_mk', 'mk_id', 'cpl_id');
    }

    // Self-referencing relationship for hierarchical structure
    public function parent()
    {
        return $this->belongsTo(MK::class, 'parent_id');
    }

    // One-to-many relationship for children (recursive)
    public function children()
    {
        return $this->hasMany(MK::class, 'parent_id');
    }
    public function transaksiSubCPMKs()
    {
        return $this->hasMany(TransaksiSubCPMK::class, 'mk_id');
    }

    public function cpmk()
    {
        return $this->hasMany(Cpmk::class,'mk_id','id');
    }
}
