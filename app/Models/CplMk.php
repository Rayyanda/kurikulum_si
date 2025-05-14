<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CplMk extends Model
{
    protected $fillable = ['cpl_id', 'mk_id'];

    protected $table = 'cpl_mk';

    public $timestamps = false;

    public function cpl()
    {
        return $this->belongsTo(CPL::class);
    }

    public function mk()
    {
        return $this->belongsTo(MK::class);
    }
}
