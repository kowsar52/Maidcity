<?php

namespace App\Models\Authorization;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $table = TableEnum::ROLES;

    protected $fillable = [
        'created_by',
        'updated_by',
        'name',
        'label'
    ];

    public static function findRoleIdByName($role)
    {
        return Role::whereName($role)->value('id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, TableEnum::ROLE_USER);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, TableEnum::ROLE_PERMISSION);
    }
    public static function alreadyRolePermission($roleId,$permissionId): bool
    {
        $query = DB::table(TableEnum::ROLE_PERMISSION)
            ->where('role_id', $roleId)
            ->where('permission_id', $permissionId);
        if ($query->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
