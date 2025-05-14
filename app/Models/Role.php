<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasPermissions;

class Role extends \Spatie\Permission\Models\Role
{
    // use HasPermissions;

    protected $fillable = ['name', 'guard_name'];

    // Tambahkan hubungan model lain atau metode khusus jika diperlukan
}
