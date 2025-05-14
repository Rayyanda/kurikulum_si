<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'no_telp',
        'email',
        'jabatan_fungsional',
        'sertifikasi_dosen',
        'bidang_pengajaran',
        'status',
        'qr_sign',
        'profil'
    ];
}
