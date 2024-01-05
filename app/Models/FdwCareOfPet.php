<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwCareOfPet extends Model
{
    use HasFactory;
    protected $table = TableEnum::FDW_CARE_OF_PETS;
    protected $fillable = [
        'fdw_bio_data_id',
        'pet_title',
        'willingness',
        'experience',
    ];

    public function fdwBioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class,'fdw_bio_data_id','id');
    }
}
