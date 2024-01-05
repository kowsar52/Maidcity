<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwMedicalHistory extends Model
{
    protected $table = TableEnum::FDW_MEDICAL_HISTORIES;
    protected $casts = [
        'past_existing_illness' => 'array',
        'food_handling_preferences' => 'array',
    ];
    protected $fillable = [
        'fdw_bio_data_id',
        'allergies',
        'allergies_detail',
        'past_existing_illness',
        'other_illness_detail',
        'physical_disabilities',
        'physical_disabilities_detail',
        'dietary_restrictions',
        'dietary_restrictions_detail',
        'food_handling_preferences',
        'other_food_handling_preferences',
    ];
    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
