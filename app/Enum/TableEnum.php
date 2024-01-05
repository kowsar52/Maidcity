<?php

declare(strict_types=1);

namespace App\Enum;

class TableEnum extends AbstractEnum
{
    public const MODULES = 'modules';
    public const PERMISSIONS = 'permissions';
    public const ROLES = 'roles';
    public const ROLE_PERMISSION = 'role_permission';
    public const ROLE_USER = 'role_user';
    public const USERS = 'users';
    public const TABLE_MODULES = 'modules';
    public const FDW_BIO_DATA = 'fdw_bio_data';
    public const FDW_MEDICAL_HISTORIES = 'fdw_medical_histories';
    public const BIO_DATA_AREA_OF_WORKS = 'bio_data_area_of_works';
    public const FDW_OVERSEAS_EMPLOYMENT_HISTORIES = 'fdw_overseas_employment_histories';
    public const FDW_WORK_EXPERIENCE_WITH_EMPLOYERS = 'fdw_work_experience_with_employers';
    public const FDW_BIO_DATA_DETAILS = 'fdw_bio_data_details';
    public const FDW_REFERRER_DETAILS = 'fdw_referrer_details';
    public const FDW_SKILL_EVALUATIONS = 'fdw_skill_evaluations';
    public const FDW_CARE_OF_INFANT_CHILDREN = 'fdw_care_of_infant_children';
    public const FDW_GENERAL_HOUSEWORKS = 'fdw_general_houseworks';
    public const FDW_LANGUAGE_ABILITIES = 'fdw_language_abilities';
    public const JOBS = 'jobs';
    public const JOB_APPLIES = 'job_applies';
    public const EMPLOYER_QUESTION_ANSWERS = 'employer_question_answers';
    public const EMPLOYERS = 'employers';
    public const STAFF = 'staff';
    public const OTHERS = 'others';
    public const SUPPLIERS = 'suppliers';
    public const SERVICES = 'services';
    public const CONTACT_US = 'contact_us';
    public const SITE_SETTINGS = 'site_settings';
    public const EMPLOYER_MDW_REQUIREMENTS = 'employer_mdw_requirements';
    public const  FDW_BIO_DATA_CONTACT_US_EMPLOYERS = 'fdw_bio_data_contact_us_employers';
    public const  BIO_DATA_SHORTLISTS = 'bio_data_shortlists';
    public const  HIRED_FDWS = 'hired_fdws';
    public const  JOIN_US = 'join_us';
    public const  FDW_BIO_DATA_LOGS = 'fdw_bio_data_logs';
    public const  FDW_CARE_OF_PETS = 'fdw_care_of_pets';

    public static function getValues(): array
    {
        return [

        ];
    }

    public static function getTranslationKeys(): array
    {
        return [

        ];
    }
}
