<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwWorkExperienceWithEmployer extends Model
{
    protected $fillable = [
        'fdw_bio_data_id',
        'present',
        'name_of_employer',
        'from_date',
        'to_date',
        'country_id',
        'other',
        'nationality',
        'language',
        'type_of_house',
        'members_in_family',
        'salary',
        'age_of_children',
        'off_days_given',
        'duties_detail',
        'reason_for_leaving',
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
