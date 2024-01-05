<?php

declare(strict_types=1);

namespace App\Enum;

use App\Models\Authorization\Permission;
use App\Services\CacheService;
use App\Services\TenantService;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RoleEnum extends AbstractEnum
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_EMPLOYER = 'employer';
    public const ROLE_STAFF = 'staff';
    public const ROLE_SUPPLIER = 'supplier';

    public static function getValues(): array
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_EMPLOYER,
            self::ROLE_STAFF,
            self::ROLE_SUPPLIER,
        ];
    }

    public static function getTranslationKeys(): array
    {
        return [
            self::ROLE_ADMIN => trans(self::ROLE_ADMIN),
            self::ROLE_EMPLOYER => trans(self::ROLE_EMPLOYER),
            self::ROLE_STAFF => trans(self::ROLE_STAFF),
            self::ROLE_SUPPLIER => trans(self::ROLE_SUPPLIER),
        ];
    }

    public static function checkPermissionParent($user, $value): bool
    {
        return self::checkCachePermissionByFieldValue($user, PermissionFieldEnum::PARENT_TYPE, $value);
    }

    public static function checkPermissionChild($user, $value): bool
    {
        return self::checkCachePermissionByFieldValue($user, PermissionFieldEnum::CHILD_TYPE, $value);
    }

    public static function checkPermission($user, $value): bool
    {
        return self::checkCachePermissionByFieldValue($user, PermissionFieldEnum::NAME, $value);
    }

    public static function saveToCache($key)
    {
        return Cache::remember($key, 86400, function () {
            return self::getRolePermissionsArray();
        });
    }

    public static function getRolePermissionsArray(): Collection
    {
        $user = Auth::user();
        return DB::table(TableEnum::PERMISSIONS)
            ->join(TableEnum::ROLE_PERMISSION, 'role_permission.permission_id', 'permissions.id')
            ->join(TableEnum::ROLES, 'role_permission.role_id', 'roles.id')
            ->join(TableEnum::ROLE_USER, 'role_user.role_id', 'roles.id')
            ->join(TableEnum::USERS, 'role_user.user_id', 'users.id')
            ->where('roles.id', $user->getRoleId())
            ->where('permissions.active', true)
            ->where('users.id', $user->id)
            ->select('permissions.name', 'permissions.parent_type', 'permissions.child_type', 'permissions.permission_type')
            ->get();
    }

    public static function checkCachePermissionByFieldValue($user, $searchKey, $searchValue): bool
    {
        if (Auth::user()->hasRole(RoleEnum::ROLE_ADMIN)) {
            return true;
        }
        $user_permissions_key = CacheEnum::CURRENT_USER_PERMISSION . "_" . TenantService::getTenant() . "_" . $user->id;
        $cachePermissions = RoleEnum::saveToCache($user_permissions_key);
        if (is_object($cachePermissions) && count($cachePermissions) > 0) {
            $permissions = json_decode(json_encode($cachePermissions), true);
            $data = array_filter($permissions, function ($permissions) use ($searchKey, $searchValue) {
                return $permissions[$searchKey] == $searchValue;
            });
            if ($data && count($data) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getSuperAdminPermissions(): array
    {
        return array(

            'view_module',
            'list_module',
            'create_module',
            'update_module',
            'delete_module',

            'view_school',
            'list_school',
            'create_school',
            'update_school',
            'delete_school',

        );
    }

    public static function getSyncedRoles(): array
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_EMPLOYER,
            self::ROLE_STAFF,
            self::ROLE_SUPPLIER,
        ];
    }

    public static function accessOnlySuperAdmin()
    {
        if (Auth::user()->hasRole(RoleEnum::ROLE_ADMIN)) {
            return true;
        } else {
            abort('403', 'Only Admin can do this Action');
        }
    }
}
