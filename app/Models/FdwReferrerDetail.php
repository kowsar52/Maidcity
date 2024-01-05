<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwReferrerDetail extends Model
{
    protected $fillable = [
        'fdw_bio_data_id',
        'full_name',
        'nick_name',
        'country_id',
        'nric_no',
        'email_1',
        'email_2',
        'contact_1',
        'contact_2',
        'facebook_url',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class);
    }
}
