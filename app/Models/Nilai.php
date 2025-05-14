<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['rubrik_id', 'kategori', 'skor_min', 'skor_max', 'deskripsi'];

    public function rubrik()
    {
        return $this->belongsTo(RubrikAnalitik::class);
    }
}
