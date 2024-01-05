<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwCareOfInfantChildren extends Model
{
    protected $table = TableEnum::FDW_CARE_OF_INFANT_CHILDREN;

    protected $fillable = [
        'fdw_bio_data_id',
        'skill_title',
        'willingness',
        'experience',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
