<?php

declare(strict_types=1);

namespace App\Enum;

use App\Models\Authorization\Module;
use App\Models\Authorization\Permission;

class ModuleEnum extends AbstractEnum
{

    public static function getValues(): array
    {
        return array();
    }

    public static function getTranslationKeys(): array
    {
        return array();
    }

    public static function generateModules($ability = null): array
    {
        return [
            KeyWordEnum::DASHBOARD,
        ];
    }

    /*Generate new modules with parent child array this auto generate all permissions as well*/

    public static function generateNewModules(): array
    {
        return [
            /*
             * Format should be like the below Commented Code
             * KeyWordEnum::STUDENT_NAV => array(
                'student_example',
            ),
            KeyWordEnum::TEACHER_NAV => array(
                'teacher_example',
            )*/];
    }

    public static function saveModulePermissions()
    {
        foreach (self::generateModules() as $outer_key => $outer_value) {
            if (is_array($outer_value)) {
                self::saveModule($outer_key, $outer_key, $outer_key);
                self::savePermission($outer_key, $outer_key, $outer_key, 'view');
                foreach ($outer_value as $inner_key => $inner_value) {
                    if (is_array($inner_value)) {
                        self::saveModule($outer_key, $inner_key, $inner_key);
                        self::savePermission($outer_key, $inner_key, $inner_key, 'view');
                        foreach ($inner_value as $key => $value) {
                            if (is_array($value)) {
                                self::savePermission($key, $outer_key, $inner_key, 'view');
                            } else {
                                self::saveModule($outer_key, $inner_key, $value);
                                self::savePermission($outer_key, $inner_key, $value, 'all');
                            }
                        }
                    } else {
                        self::saveModule($outer_key, null, $inner_value);
                        self::savePermission($outer_key, null, $inner_value, 'all');
                    }
                }
            } else {
                self::saveModule($outer_key, null, $outer_value);
                self::savePermission($outer_key, null, $outer_value, 'view');
            }
        }
    }

    public static function savePermission($outer_key, $inner_key, $value, $type)
    {
        if ($type == AbilityEnum::VIEW) {
            self::saveByNameAndFunction("view_" . $value, $outer_key, $inner_key);
        } else {
            foreach (AbilityEnum::getValues() as $ability) {
                self::saveByNameAndFunction($ability . "_" . $value, $outer_key, $inner_key);
            }
        }
    }

    public static function saveByNameAndFunction($name, $outer_key, $inner_key)
    {
        Permission::updateOrCreate([
            'name' => $name
        ], [

            'label' => str_replace('_', ' ', $name),
            'parent_type' => $outer_key,
            'child_type' => $inner_key,
            'active' => true,
        ]);
    }

    public static function saveModule($outer_key, $inner_key, $value)
    {
        Module::updateOrCreate([
            'name' => $value
        ], [
            'name' => $value,
            'parent_type' => $outer_key,
            'child_type' => $inner_key,
            'active' => true
        ]);
    }
}
