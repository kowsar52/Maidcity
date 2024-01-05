<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BioDataShortlist extends Model
{
    use HasFactory;
    protected $table = TableEnum::BIO_DATA_SHORTLISTS;
    protected $fillable = [
        'fwd_bio_data_id',
        'employer_id',
    ];

    public function bioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class,'fwd_bio_data_id','id');
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
