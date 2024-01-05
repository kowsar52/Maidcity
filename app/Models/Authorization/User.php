<?php

namespace App\Models\Authorization;

use App\Enum\RoleEnum;
use App\Enum\TableEnum;
use App\Models\EmployerMDWRequirement;
use App\Models\Supplier;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasFactory, SoftDeletes, HasRoles;

    protected $table = TableEnum::USERS;
    protected $casts = [
        'password' => 'hashed'
    ];

    protected $fillable = [
        'photo',
        'name',
        'email',
        'current_password',
        'password',
        'active',
        'email_verified_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, TableEnum::ROLE_USER);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->active == 1;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->photo ? url('storage/' . $this->photo) : null;
    }

    public function employerMdwRequirement(): HasOne
    {
        return $this->hasOne(EmployerMDWRequirement::class,'user_id','id');
    }

    public function supplier(): HasOne
    {
        return $this->hasOne(Supplier::class);
    }
}
