<?php

namespace App\Models;

use App\Enum\TableEnum;
use Illuminate\Database\Eloquent\Model;

class FdwBioDataDetail extends Model
{
    protected $table = TableEnum::FDW_BIO_DATA_DETAILS;

    protected $casts = [
        'availability_of_fdw_for_interview' => 'array',
        'recommended_helper' => 'array',
        'fdw_date' => 'date',
        'ea_personnel_date' => 'date',
        'employer_date' => 'date',
    ];

    protected $fillable = [
        'fdw_bio_data_id',
        'basic_salary',
        'preference_for_rest_day',
        'special_mention',
        'any_other_remarks',
        'recommended_helper',
        'previous_working_experience_in_singapore',
        'prev_employer_one_feedback',
        'prev_employer_two_feedback',
        'availability_of_fdw_for_interview',
        'fdw_other_details',
        'fdw_name_signature',
        'fdw_date',
        'personnel_name_reg_no',
        'ea_personnel_date',
        'employer_nric_no',
        'employer_date',
    ];
}
