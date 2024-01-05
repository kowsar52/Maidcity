<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApply extends Model
{
    use HasFactory;
    protected $table = TableEnum::JOB_APPLIES;
    protected $fillable = [
        'full_name',
        'nationality',
        'date_of_birth',
        'email',
        'contact_number',
        'alternative_contact_number',
        'whatsapp',
        'facebook_messenger_url',
        'job_id',
        'created_by',
        'updated_by',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
