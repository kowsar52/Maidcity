<?php

namespace App\Models\Authorization;

use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use function app_path;

class Permission extends Model
{
    use HasFactory;

    protected $table = TableEnum::PERMISSIONS;
    protected $fillable = [
        'created_by',
        'updated_by',
        'school_id',
        'name',
        'label',
        'function_name',
        'parent_type',
        'child_type',
        'permission_type',
        'active'
    ];

    public static function getPermissions($model)
    {
        return $model::modulePermissions();
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public static function syncPermissions(): bool
    {
        $models = self::getModels(app_path() . "/Models", '\App\Models\\');
        $permissions = array();
        foreach ($models as $model) {
            if (method_exists($model, 'modulePermissions')) {
                $permissions = array_merge($permissions, $model::modulePermissions());
            }
        }
        $existingPermissions = self::all()->pluck('name')->toArray();
        $permissionsToBeDeleted = array_diff($existingPermissions, $permissions);
        $permissionsToBeAdded = array_diff($permissions, $existingPermissions);
        if (!empty($permissionsToBeDeleted)) {
            Permission::whereIn('name', $permissionsToBeDeleted)->delete();
        }
        foreach ($permissionsToBeAdded as $permission) {
            Permission::create([
                'name' => $permission,
                'label' => ucwords(str_replace('_', ' ', $permission)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }
        return true;
    }

    public static function getModels($path, $namespace): array
    {
        $models = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..')
                continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $models = array_merge($models, self::getModels($filename));
            } else {
                $models[] = substr($namespace . $result, 0, -4);
            }
        }
        return $models;
    }
}
