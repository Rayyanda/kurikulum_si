<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeknikPenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'cpmk_id',
        // 'mk_id',
        'tahap_penilaian',
        'instrumen',
        'kriteria',
        'bobot'
    ];

    protected $casts = [
        'instrumen' => 'array'
    ];

    public function types()
    {
        return $this->belongsToMany(JenisPenilaian::class,'jenis_teknik_penilaians','cpmk_id','cpmk_id');
    }

    public function scoring()
    {
        return $this->hasMany(JenisTeknikPenilaian::class);
    }

    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class);
    }
}
