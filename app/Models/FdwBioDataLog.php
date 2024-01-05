<?php

namespace App\Models;

use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FdwBioDataLog extends Model
{
    protected $fillable = [
        'fdw_record_id',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bioDataRecord(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class, 'fdw_record_id');
    }
}
