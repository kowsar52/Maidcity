<?php


declare(strict_types=1);

namespace App\Enum;

use App\Models\Authorization\Permission;
use App\Models\Authorization\RolePermission;
use App\Services\PermissionService;
use App\Services\RoleService;


class PermissionEnum extends AbstractEnum
{

    public static function getValues(): array
    {
        return [
        ];
    }

    public static function getTranslationKeys(): array
    {
        return [
        ];
    }

    public static function allCustomPermissions(): array
    {
        return [
//            KeyWordEnum::DASHBOARD,
        ];
    }

    public static function defaultGuardianPermissions(): array
    {
        return array(
            'view_student_attendance',
            'list_student_attendance',
            'view_assignment_submission',
            'list_assignment_submission',
        );
    }
    public static function syncCustomPermissions()
    {
        PermissionEnum::saveCustomPermissions();
        self::syncRolePermissions(RoleEnum::ROLE_ADMIN);
    }
    public static function syncPermission()
    {
        ModuleEnum::saveModulePermissions();
        PermissionEnum::saveCustomPermissions();
        self::syncRolePermissions(RoleEnum::ROLE_ADMIN);
    }

    public static function syncRolePermissions($role)
    {
        $roleId = RoleService::getRoleIdByName($role);
        $permissions = array();
        if ($role == RoleEnum::ROLE_ADMIN) {
            $permissions = self::defaultSuperAdminPermissions();
        }
        if (count($permissions) > 0) {
            foreach ($permissions as $permission) {
                if (PermissionService::hasAlreadyPermissionByName($permission)) {
                    self::applySyncing(PermissionService::getPermissionByName($permission), $roleId);
                }
            }
        }
    }

    public static function saveCustomPermissions()
    {
        foreach (PermissionEnum::allCustomPermissions() as $outer_key => $outer_value) {
            if (is_array($outer_value)) {
                self::saveByNameAndFunction($outer_key, $outer_key, $outer_key);
                foreach ($outer_value as $inner_key => $inner_value) {
                    if (is_array($inner_value)) {
                        self::saveByNameAndFunction($outer_key, $inner_key, $inner_key);
                        foreach ($inner_value as $key => $value) {
                            if (is_array($value)) {
                                self::saveByNameAndFunction($key, $outer_key, $inner_key);
                            } else {
                                self::saveByNameAndFunction($outer_key, $inner_key, $value);
                            }
                        }
                    } else {
                        self::saveByNameAndFunction($outer_key, null, $inner_value);
                    }
                }
            } else {
                self::saveByNameAndFunction($outer_key, null, $outer_value);
            }
        }
    }

    public static function saveByNameAndFunction($outer_key, $inner_key, $name)
    {
        Permission::updateOrCreate([
            'name' => $name
        ], [
            'label' => str_replace('_', ' ', $name),
            'parent_type' => $outer_key,
            'child_type' => $inner_key,
            'active' => true,
            'permission_type' => PermissionTypeEnum::CUSTOM
        ]);
    }

    private static function defaultSuperAdminPermissions(): array
    {
        return [];
    }

    private static function applySyncing($pId, $roleId)
    {
        RolePermission::updateOrCreate(
            [
                'permission_id' => $pId,
                'role_id' => $roleId
            ],
            [
                'permission_id' => $pId,
                'role_id' => $roleId
            ]
        );
    }
}
