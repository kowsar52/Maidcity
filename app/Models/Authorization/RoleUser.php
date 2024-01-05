<?php

namespace App\Models\Authorization;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = TableEnum::ROLE_USER;
    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
