<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSubCPMK extends Model
{
    use HasFactory;

    protected $table = 'transaksi_subcpmk';

    protected $fillable = [
        'mk_id',
        'cpmk_id',
        'subcpmk_id',
        'bobot',
        'validation_status', // tambahkan kolom validation_status
        'validation_note',   // tambahkan kolom validation_note
    ];

    public function mk()
    {
        return $this->belongsTo(MK::class, 'mk_id');
    }

    public function cpmk()
    {
        return $this->belongsTo(CPMK::class, 'cpmk_id');
    }

    public function subcpmk()
    {
        return $this->belongsTo(SubCPMK::class, 'subcpmk_id');
    }
}
