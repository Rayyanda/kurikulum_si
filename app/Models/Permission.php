<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends \Spatie\Permission\Models\Permission
{
    protected $fillable = ['name', 'guard_name', 'deskripsi'];
}
