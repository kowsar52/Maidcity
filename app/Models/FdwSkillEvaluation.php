<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwSkillEvaluation extends Model
{
    protected $fillable = [
        'fdw_bio_data_id',
        'area_of_work',
        'willingness',
        'experience',
        'assessment',
        'age_range',
        'food_handling_preferences',
        'name_dishes',
    ];
    protected $casts = [
        'food_handling_preferences' => 'array',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
