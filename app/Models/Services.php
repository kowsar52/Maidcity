<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'title',
        'feature_image',
        'cover_image',
        'description',
        'active',
    ];
}
