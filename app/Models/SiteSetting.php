<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = TableEnum::SITE_SETTINGS;

    protected $fillable = [
        'label',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
