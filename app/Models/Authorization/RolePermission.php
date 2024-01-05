<?php

namespace App\Models\Authorization;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = TableEnum::ROLE_PERMISSION;
    protected $fillable = [
        'permission_id',
        'role_id',
    ];
}
