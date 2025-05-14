<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CplPl extends Model
{
    protected $table = 'matrix_cpl_pl';
    protected $guarded = [];

    public function cpls()
    {
        return $this->belongsTo(CPL::class, 'cpl_id');
    }

    public function pls()
    {
        return $this->belongsTo(PL::class, 'pl_id');
    }
}
