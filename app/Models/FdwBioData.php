<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use App\Models\FDWDefinition\BioDataAreaOfWork;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class FdwBioData extends Model
{
    use softDeletes;
    protected $table = TableEnum::FDW_BIO_DATA;
    protected $fillable = [
        'photo',
        'bio_data_type',
        'date_of_last_medical',
        'name',
        'date_of_birth',
        'age',
        'place_of_birth',
        'height',
        'weight',
        'nationality',
        'residential_address_in_home_country',
        'name_of_airport',
        'religion',
        'education_level',
        'number_of_siblings',
        'no_of_children',
        'age_of_children',
        'marital_status',
        'passport_available',
        'birth_order_in_family',
        'others',
        'husband_name',
        'husband_age',
        'husband_occupation',
        'contact_no_in_home_country',
        'contact_no_in_singapore_country',
        'facebook_url',
        'ym_skype',
        'email',
        'other_contact',
        'method_of_evaluation_of_skills',
        'other_skill',
        'interview_by_singapore_via',
        'interview_by_overseas_training_centre_via',
        'name_of_foreign_training_centre',
        'name_of_third_party_training_centre',
        'certificates',
        'passport',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'date_of_last_medical' => 'date',
        'date_of_birth' => 'date',
        'availability_of_fdw_for_interview' => 'array',
        'interview_by_singapore_via' => 'array',
        'interview_by_overseas_training_centre_via' => 'array',
        'certificates' => 'array',
        'passport' => 'array',
        'bio_data_type' => 'array',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function bioDataDetail(): HasOne
    {
        return $this->hasOne(FdwBioDataDetail::class, 'fdw_bio_data_id', 'id');
    }

    public function medicalHistory(): HasOne
    {
        return $this->hasOne(FdwMedicalHistory::class, 'fdw_bio_data_id', 'id');
    }

    public function referrerDetail(): HasOne
    {
        return $this->hasOne(FdwReferrerDetail::class, 'fdw_bio_data_id', 'id');
    }

    public function overseasEmploymentHistories(): HasMany
    {
        return $this->hasMany(FdwOverseasEmploymentHistory::class, 'fdw_bio_data_id', 'id');
    }

    public function workExperienceWithEmployers(): HasMany
    {
        return $this->hasMany(FdwWorkExperienceWithEmployer::class, 'fdw_bio_data_id', 'id');
    }

    public function skillEvaluations(): HasMany
    {
        return $this->hasMany(FdwSkillEvaluation::class, 'fdw_bio_data_id', 'id');
    }

    public function careOfInfantChildrens(): HasMany
    {
        return $this->hasMany(FdwCareOfInfantChildren::class, 'fdw_bio_data_id', 'id');
    }

    public function generalHouseworks(): HasMany
    {
        return $this->hasMany(FdwGeneralHousework::class, 'fdw_bio_data_id', 'id');
    }

    public function languageAbilities(): HasMany
    {
        return $this->hasMany(FdwLanguageAbilities::class, 'fdw_bio_data_id', 'id');
    }

    public function shortlistBioData(): HasMany
    {
        return $this->hasMany(BioDataShortlist::class,'fwd_bio_data_id','id');
    }

    public function bioDataLogs(): HasMany
    {
        return $this->hasMany(FdwBioDataLog::class,'fdw_record_id','id');
    }

    public function careOfPet(): HasMany
    {
        return $this->hasMany(FdwCareOfPet::class,'fdw_bio_data_id','id');
    }
}
