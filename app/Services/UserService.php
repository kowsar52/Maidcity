<?php

namespace App\Services;

use App\Models\Authorization\Role;

class UserService
{
    public static function getRoleForDropdown()
    {
        return Role::whereIn('name',['Employer','Staff','Others'])->pluck('name','id');
    }
}
