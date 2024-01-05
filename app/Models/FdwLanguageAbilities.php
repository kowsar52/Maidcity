<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwLanguageAbilities extends Model
{
    Protected $table = TableEnum::FDW_LANGUAGE_ABILITIES;
    protected $fillable = [
        'fdw_bio_data_id',
        'language_id',
        'other',
        'rating',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
