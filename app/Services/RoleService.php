<?php

namespace App\Services;

use App\Enum\RoleEnum;
use App\Models\Authorization\Role;
use Illuminate\Http\Request;


class RoleService
{
    public static function getRoleIdByName($name)
    {
        return Role::where('name',$name)->first();
    }
    public function applyGlobalSearch(Request $request, $data)
    {
        $keyword = $request->query('s');
        return $data->where(function ($q) use ($keyword) {
            $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('label', 'like', '%' . $keyword . '%');
        });
    }
}
