<?php

namespace App\Services;

use App\Enum\AbilityEnum;
use App\Enum\ModuleEnum;
use App\Enum\TableEnum;
use App\Models\Authorization\Module;
use App\Models\Authorization\Permission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ModuleService
{
    public static function savePermission($permission, $parent)
    {
        if ($parent == 'parent') {
            $name = AbilityEnum::VIEW . "_" . strtolower(str_replace(' ', '_', $permission));
            Permission::updateOrCreate([
                'name' => $name
            ], [
                'label' => str_replace('_', ' ', $permission),
                'function_name' => str_replace('_', ' ', $permission)
            ]);
        } else {
            foreach (AbilityEnum::getValues() as $ability) {
                $name = $ability . "_" . strtolower(str_replace(' ', '_', $permission));
                Permission::updateOrCreate([
                    'name' => $name
                ], [
                    'label' => str_replace('_', ' ', $permission),
                    'function_name' => str_replace('_', ' ', $permission)
                ]);
            }
        }
    }

    public static function saveModule($outer_key, $inner_key, $value)
    {
        Module::updateOrCreate([
            'name' => $value
        ], [
            'name' => $value,
            'parent_type' => $outer_key,
            'child_type' => $inner_key
        ]);
    }
}
