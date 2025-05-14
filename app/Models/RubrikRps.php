<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RubrikRps extends Model
{
    use HasFactory;

    protected $table ="rubrik_rps";
    protected $fillable = [
        'jadwalrps_id',
        'jenis_rubrik'
    ];


    public function rubrik():HasOne
    {
        return $this->hasOne(RubrikSkalaPresepsi::class,'id','rubrik_sp_id');
    }
}
