<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RpsCpl extends Model
{
    use HasFactory;

    protected $table = "rps_cpls";
    protected $fillable = [
        'rps_id',
        'cpl_id',
    ];

    public function rps():BelongsTo
    {
        return $this->belongsTo(Rps::class,'rps_id','id');
    }

    public function cpl():BelongsTo
    {
        return $this->belongsTo(CPL::class,'cpl_id','id');
    }
}
