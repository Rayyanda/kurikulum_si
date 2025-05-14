<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenilaian extends Model
{
    use HasFactory;
    protected $table="jenis_penilaians";
    protected $fillable =[
        'name',
    ];

    public function jtp()
    {
        return $this->hasOne(JenisTeknikPenilaian::class,'jenis_penilaian_id','id');
    }
}
