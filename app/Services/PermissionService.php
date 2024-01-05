<?php

namespace App\Services;

use App\Enum\PermissionTypeEnum;
use App\Enum\TableEnum;
use App\Models\Authorization\Permission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PermissionService
{
    public static function getPermissionByName($name)
    {
        return Permission::where('name', $name)->value('id');
    }

    public static function hasAlreadyPermissionByName($name)
    {
        return Permission::where('name', $name)->exists();
    }
}
