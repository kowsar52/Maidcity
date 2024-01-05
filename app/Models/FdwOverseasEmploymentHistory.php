<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwOverseasEmploymentHistory extends Model
{
    protected $fillable = [
        'fdw_bio_data_id',
        'from_date',
        'to_date',
        'country_id',
        'employer',
        'work_duties',
        'remarks',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
