<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BkMk extends Model
{
    protected $fillable = ['bk_id', 'mk_id'];

    protected $table = 'bk_mk'; // Sesuaikan dengan nama tabel di database

    public $timestamps = false;

    public function bk()
    {
        return $this->belongsTo(BK::class);
    }

    public function mk()
    {
        return $this->belongsTo(MK::class);
    }
}
