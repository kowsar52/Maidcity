<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = TableEnum::CONTACT_US;
    protected $casts = [
        'branch' => 'array',
    ];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'branch',
    ];
}
