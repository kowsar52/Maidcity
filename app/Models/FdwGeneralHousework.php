<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwGeneralHousework extends Model
{
    protected $table = TableEnum::FDW_GENERAL_HOUSEWORKS;
    protected $fillable = [
        'fdw_bio_data_id',
        'work_title',
        'willingness',
        'experience',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
