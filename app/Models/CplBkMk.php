<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CplBkMk extends Model
{
    protected $fillable = ['cpl_id', 'bk_id', 'mk_id'];

    protected $table = 'cpl_bk_mk';

    public function cpl()
    {
        return $this->belongsTo(CPL::class, 'cpl_id');
    }

    public function bk()
    {
        return $this->belongsTo(BK::class, 'bk_id');
    }

    public function mk()
    {
        return $this->belongsTo(MK::class, 'mk_id');
    }
}
