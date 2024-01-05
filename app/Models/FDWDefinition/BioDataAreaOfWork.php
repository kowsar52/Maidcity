<?php

namespace App\Models\FDWDefinition;

use App\Models\FdwBioData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BioDataAreaOfWork extends Model
{
    protected $fillable = [
        'name',
    ];
}
