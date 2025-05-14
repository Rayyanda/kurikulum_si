<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTeknikPenilaian extends Model
{
    use HasFactory;
    protected $table = "jenis_teknik_penilaians";
    protected $fillable = [
        'cpmk_id',
        'jenis_penilaian_id',
        'score'
    ];

    public function technique()
    {
        return $this->belongsTo(TeknikPenilaian::class);
    }

    public function type()
    {
        return $this->belongsTo(JenisPenilaian::class);
    }
}
