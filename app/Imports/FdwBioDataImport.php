<?php

namespace App\Imports;

use App\Models\FdwBioData;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FdwBioDataImport implements ToCollection, WithValidation, WithHeadingRow
{
    public function rules(): array
    {
        return [
            'bio_data_type' => ['required'],
            'name' => ['required'],
            'email' => ['email'],
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $bio_data_type = explode(',', $row['bio_data_type']);
            $past_existing_illness = explode(',', $row['past_existing_illness']);
            $food_handling_preferences = explode(',', $row['food_handling_preferences']);
            $interview_by_singapore_via = explode(',', $row['interview_by_singapore_via']);
            $interview_by_overseas_training_centre_via = explode(',', $row['interview_by_overseas_training_centre_via']);
            $singapore_skill = explode('|', $row['singapore_skill_evaluationarea_of_workwillingnessexperienceassessmentage_rangefood_handling_preferencesname_dishes']);
            $care_of_infant = explode('|', $row['care_of_infant_childskill_titlewillingnessexperience']);
            $general_houseworkwork = explode('|', $row['general_houseworkwork_titlewillingnessexperience']);
            $care_of_pet = explode('|', $row['care_of_petpet_titlewillingnessexperience']);
            $recommended_helper = explode(',', $row['recommended_helper']);
            $language_abilities = explode('|', $row['language_abilitieslanguageotherrating']);
            $work_experience = explode(',', $row['work_experience_with_employername_of_employerfrom_dateto_datecountry_idnationalitylanguagetype_of_housemembers_in_familysalaryage_of_childrenoff_days_givenduties_detailreason_for_leaving']);
            $availability_of_fdw_for_interview = explode(',', $row['availability_of_fdw_for_interview']);
            $model = FdwBioData::create([
                'bio_data_type' => $bio_data_type,
                'date_of_last_medical' => $row['date_of_last_medical'],
                'name' => $row['name'],
                'date_of_birth' => $row['date_of_birth'],
                'age' => $row['age'],
                'place_of_birth' => $row['place_of_birth'],
                'height' => $row['height'],
                'weight' => $row['weight'],
                'nationality' => $row['nationality'],
                'residential_address_in_home_country' => $row['residential_address_in_home_country'],
                'name_of_airport' => $row['name_of_airport'],
                'religion' => $row['religion'],
                'education_level' => $row['education_level'],
                'number_of_siblings' => $row['number_of_siblings'],
                'birth_order_in_family' => $row['birth_order_in_family'],
                'no_of_children' => $row['no_of_children'],
                'age_of_children' => $row['age_of_children_if_any'],
                'marital_status' => $row['marital_status'],
                'passport_available' => $row['passport_available'],
                'contact_no_in_singapore_country' => $row['contact_no_in_singapore_country'],
                'contact_no_in_home_country' => $row['contact_no_in_home_country'],
                'facebook_url' => $row['facebook_url'],
                'ym_skype' => $row['whatsapp'],
                'email' => $row['email'],
                'other_contact' => $row['other_social_media_ids'],
                'method_of_evaluation_of_skills' => $row['method_of_evaluation_of_skills'],
                'interview_by_singapore_via' => $interview_by_singapore_via,
                'name_of_foreign_training_centre' => $row['name_of_foreign_training_centre'],
                'name_of_third_party_training_centre' => $row['name_of_third_party_training_centre'],
                'interview_by_overseas_training_centre_via' => $interview_by_overseas_training_centre_via,
            ]);
            if ($model){
                $model->medicalHistory()->create([
                    'allergies' => $row['allergies'],
                    'allergies_detail' => $row['allergies_detail_if_yes'],
                    'past_existing_illness' => $past_existing_illness,
                    'other_illness_detail' => $row['other_illness_detail_if_other'],
                    'physical_disabilities' => $row['physical_disabilities'],
                    'physical_disabilities_detail' => $row['physical_disabilities_detail_if_yes'],
                    'dietary_restrictions' => $row['dietary_restrictions'],
                    'dietary_restrictions_detail' => $row['dietary_restrictions_detail_if_yes'],
                    'food_handling_preferences' => $food_handling_preferences,
                    'other_food_handling_preferences' => $row['other_food_handling_preferences'],
                ]);
                foreach ($singapore_skill as $skills){
                    $skill = explode(',',$skills);
                    $food_handling_preferences = (($skill[5] == 'null') ? null : explode('-',$skill[5]));
                    $model->skillEvaluations()->create([
                        'area_of_work' => (($skill[0] == 'null') ? null : $skill[0]),
                        'willingness' => (($skill[1] == 'null') ? null : $skill[1]),
                        'experience' => (($skill[2] == 'null') ? null : $skill[2]),
                        'assessment' => (($skill[3] == 'null') ? null : $skill[3]),
                        'age_range' => (($skill[4] == 'null') ? null : $skill[4]),
                        'food_handling_preferences' => $food_handling_preferences,
                        'name_dishes' => (($skill[6] == 'null') ? null : $skill[6]),
                    ]);
                }
                foreach ($care_of_infant as $infant) {
                    $infant = explode(',',$infant);
                    $model->careOfInfantChildrens()->create([
                        'skill_title' => $infant[0],
                        'willingness' => $infant[1],
                        'experience' => $infant[2],
                    ]);
                }
                foreach ($general_houseworkwork as $housework) {
                    $housework = explode(',',$housework);
                    $model->generalHouseworks()->create([
                        'work_title' => $housework[0],
                        'willingness' => $housework[1],
                        'experience' => $housework[2],
                    ]);
                }
                foreach ($care_of_pet as $pet) {
                    $pet = explode(',',$pet);
                    $model->careOfPet()->create([
                        'pet_title' => $pet[0],
                        'willingness' => $pet[1],
                        'experience' => $pet[2],
                    ]);
                }
                $model->bioDataDetail()->create([
                    'recommended_helper' => $recommended_helper,
                    'previous_working_experience_in_singapore' => $row['previous_working_experience_in_singapore'],
                    'prev_employer_one_feedback' => $row['prev_employer_one_feedback'],
                    'prev_employer_two_feedback' => $row['prev_employer_two_feedback'],
                    'basic_salary' => $row['basic_salary'],
                    'preference_for_rest_day' => $row['preference_for_rest_day'],
                    'special_mention' => $row['special_mention'],
                    'any_other_remarks' => $row['any_other_remarks'],
                    'availability_of_fdw_for_interview' => $availability_of_fdw_for_interview,
                    'fdw_other_details' => $row['fdw_other_details'],
                    'fdw_name_signature' => $row['fdw_name_signature'],
                    'fdw_date' => $row['fdw_date'],
                    'personnel_name_reg_no' => $row['ea_personnel_name_reg_no'],
                    'ea_personnel_date' => $row['ea_personnel_date'],
                    'employer_nric_no' => $row['employer_nric_no'],
                    'employer_date' => $row['employer_date'],
                ]);
                foreach ($language_abilities as $language){
                    $language = explode(',',$language);
                    $model->languageAbilities()->create([
                        'language_id' => $language[0],
                        'other' => (($language[1] == 'null') ? null : $language[1]),
                        'rating' => $language[2],
                    ]);
                }
                $model->workExperienceWithEmployers()->create([
                    'name_of_employer' => (($work_experience[0] == 'null') ? null : $work_experience[0]),
                    'from_date' => (($work_experience[1] == 'null') ? null : $work_experience[1]),
                    'to_date' => (($work_experience[2] == 'null') ? null : $work_experience[2]),
                    'country_id' => (($work_experience[3] == 'null') ? null : $work_experience[3]),
                    'nationality' => (($work_experience[4] == 'null') ? null : $work_experience[4]),
                    'language' => (($work_experience[5] == 'null') ? null : $work_experience[5]),
                    'type_of_house' => (($work_experience[6] == 'null') ? null : $work_experience[6]),
                    'members_in_family' => (($work_experience[7] == 'null') ? null : $work_experience[7]),
                    'salary' => (($work_experience[8] == 'null') ? null : $work_experience[8]),
                    'age_of_children' => (($work_experience[9] == 'null') ? null : $work_experience[9]),
                    'off_days_given' => (($work_experience[10] == 'null') ? null : $work_experience[10]),
                    'duties_detail' => (($work_experience[11] == 'null') ? null : $work_experience[11]),
                    'reason_for_leaving' => (($work_experience[12] == 'null') ? null : $work_experience[12]),
                ]);
                $model->referrerDetail()->create([
                    'full_name' => $row['referrer_full_name'],
                    'nick_name' => $row['nick_name'],
                    'country_id' => $row['referrer_nationality'],
                    'nric_no' => $row['nric_no'],
                    'email_1' => $row['email_1'],
                    'email_2' => $row['email_2'],
                    'contact_1' => $row['contact_1'],
                    'contact_2' => $row['contact_2'],
                    'facebook_url' => $row['referrer_facebook_url'],
                ]);
            }
        }
    }
}
