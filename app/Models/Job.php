<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = TableEnum::JOBS;
    protected $fillable = [
        'job_title',
        'job_description',
        'type_of_mdw',
        'nationality_preferred',
        'salary_range',
        'rest_day',
        'expected_start_date',
        'employer_requirement',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'expected_start_date' => 'date',
        'type_of_mdw' => 'array',
        'nationality_preferred' => 'array',
        'employer_requirement' => 'array',
    ];

    public function jobApply(): HasMany
    {
        return $this->hasMany(JobApply::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
