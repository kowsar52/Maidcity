<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    protected $table = TableEnum::SUPPLIERS;
    protected $fillable = [
        'prefix',
        'user_id',
        'photo',
        'company_name',
        'person_1',
        'email_1',
        'phone_number_1',
        'person_2',
        'email_2',
        'phone_number_2',
        'other_information',
        'full_address',
        'created_by',
        'updated_by'
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
