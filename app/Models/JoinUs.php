<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinUs extends Model
{
    use HasFactory;
    protected $table = TableEnum::JOIN_US;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'file',
        'message',
    ];
}
