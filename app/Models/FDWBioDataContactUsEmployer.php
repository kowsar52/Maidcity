<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FDWBioDataContactUsEmployer extends Model
{
    use HasFactory;
    protected $table = TableEnum::FDW_BIO_DATA_CONTACT_US_EMPLOYERS;

    protected $casts = [
        'branch_enquiry' => 'array',
    ];
    protected $fillable = [
        'fdw_bio_data_id',
        'employer_id',
        'branch_enquiry',
        'message',
        'status',
    ];

    public function fdwBioData(): BelongsTo
    {
        return $this->belongsTo(FdwBioData::class, 'fdw_bio_data_id');
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
