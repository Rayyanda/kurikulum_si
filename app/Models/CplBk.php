<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CplBk extends Model
{
    protected $fillable = ['cpl_id', 'bk_id'];

    protected $table = 'cpl_bk';

    public $timestamps = false;

    public function cpl()
    {
        return $this->belongsTo(CPL::class);
    }

    public function bk()
    {
        return $this->belongsTo(BK::class);
    }
}
