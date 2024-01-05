<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HiredFDW extends Model
{
    protected $table = TableEnum::HIRED_FDWS;
    protected $fillable = [
        'employer_id',
        'bio_data_id',
        'status',
        'date',
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
    public function fdwBioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class, 'bio_data_id');
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
