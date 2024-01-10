<?php

namespace App\Services;

use App\Models\FdwBioData;
use App\Models\Services;
use App\Models\SiteSetting;
use Carbon\Carbon;

class GeneralService
{
    public static function getCountries($id = null)
    {
        $data = [
            1 => 'Singapore',
            2 => 'Malaysia',
            3 => 'Hong Kong',
            4 => 'Taiwan',
            5 => 'China',
            6 => 'South Korea',
            7 => 'Japan',
            8 => 'Thailand',
            9 => 'Indonesian',
            10 => 'Philippines',
            11 => 'Kuwait',
            12 => 'Cambodia',
            13 => 'Indian',
            14 => 'Sri Lanka',
            15 => 'Bangladesh',
            16 => 'Myanmar',
            17 => 'Macau',
            18 => 'U.A.E',
            19 => 'Jordan',
            20 => 'Qatar',
            21 => 'Saudi Arabia',
            22 => 'Oman',
            23 => 'Bahrain',
            24 => 'Others'
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function nationalityForDropdown($id = null)
    {
        $data = [
            1 => __('general.singapore'),
            2 => __('general.burmese'),
            3 => __('general.indonesian'),
            4 => __('general.filipino'),
            5 => __('general.cambodian'),
            6 => __('general.indian'),
            7 => __('general.mizoram'),
            8 => __('general.srilankan'),
            9 => __('general.bangladeshi'),
            10 => __('general.malaysian'),
            11 => __('general.thai'),
            12 => __('general.hong_kong'),
            13 => __('general.taiwan'),
            14 => __('general.middle_east'),
            15 => __('general.other'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function countryForDropdown($id = null)
    {
        $data = [
            1 => __('general.singapore'),
            //2 => __('general.myanmar'),
            //3 => __('general.indonesia'),
            //4 => __('general.philippines'),
            //5 => __('general.cambodia'),
            //6 => __('general.india'),
            //7 => __('general.india_mizoram'),
            //8 => __('general.srilanka'),
            //9 => __('general.bangladesh'),
            10 => __('general.malaysia'),
            //11 => __('general.thai'),
            12 => __('general.hong_kong'),
            13 => __('general.taiwan'),
            14 => __('general.middle_east'),
            15 => __('general.other'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function bioDataTypeForDropdown($id = null)
    {
        $data = [
            1 => __('general.mdw'),
            2 => __('general.aps'),
            3 => __('general.caregiver'),
            4 => __('general.transfer'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function categoryForDropdown($id = null)
    {
        $data = [
            'baby_care' => __('general.baby_care'),
            'child_care' => __('general.child_care'),
            'cooking' => __('general.cooking'),
            'disable_care' => __('general.disable_care'),
            'elderly_care' => __('general.elderly_care'),
            'housekeeping' => __('general.housekeeping'),
            'pet_care' => __('general.pet_care'),
            'marketing' => __('general.marketing'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function experienceLevelForDropdown($id = null)
    {
        $data = [
            1 => __('general.fresh_new'),
            2 => __('general.ex_singapore'),
            3 => __('general.ex_hong_kong_macau'),
            4 => __('general.ex_taiwan'),
            5 => __('general.ex_malaysia'),
            6 => __('general.ex_middle_east'),
            7 => __('general.ex_Other'),

        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function maritalStatusForDropdown($id = null)
    {
        $data = [
            0 => 'Single',
            1 => 'Married',
            2 => 'Divorced/Separated',
            3 => 'Live-in-Partner',
            4 => 'Widowed',
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function languageForDropdown($id = null)
    {
        $data = [
            1 => __('general.english'),
            2 => __('general.chinese_mandarin'),
            3 => __('general.bahasa_melayu'),
            4 => __('general.cantonese'),
            5 => __('general.hokkien'),
            6 => __('general.teochew'),
            7 => __('general.tamil'),
            8 => __('general.hindi'),
            9 => __('general.other'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function ageRageForDropdown($id = null)
    {
        $data = [
            1 => __('general.23_to_29'),
            2 => __('general.30_to_35'),
            3 => __('general.35_to_39'),
            4 => __('general.above_40'),
        ];
        if (!is_null($id)) {
            $data = $data[$id];
        }

        return $data;
    }

    public static function dateFormat($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }

    public static function getAreaOfWork($id = null)
    {
        $data = [
            1 => 'Care of Infant/Children',
            2 => 'Care of Elderly',
            3 => 'Care of Disable',
            4 => 'General Housework',
            5 => 'Cooking',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getInfantChildDropdown($id = null)
    {
        $data = [
            1 => 'Care of newborn baby (0-3 months)',
            2 => 'Care of babies aged (4-12 months)',
            3 => 'Care of children (1-5 years)',
            4 => 'Care of children (6-10 years)',
            5 => 'Care of children (Above 10 years)',
            6 => 'Care of child with special needs',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getGeneralHouseworkDropdown($id = null)
    {
        $data = [
            1 => 'Operate washing machine',
            2 => 'Operate gas stove',
            3 => 'Operate vacuum cleaner',
            4 => 'Operate microwave oven',
            5 => 'Ironing',
            //6 => 'Cooking',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function fiveStar($rating_star)
    {
        $rating = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating_star) {
                $rating .= '<i class="fa fa-star text-danger"></i >';
            } else {
                $rating .='<i class="far fa-star" ></i>';

            }
        }
        return $rating;
    }

    public static function getMedicalHistry()
    {
        return  [
            'mental_illness' => __('general.mental_illness'),
            'epilepsy' => __('general.epilepsy'),
            'asthma' => __('general.asthma'),
            'diabetes' => __('general.diabetes'),
            'hypertension' => __('general.hypertension'),
            'tuberculosis' => __('general.tuberculosis'),
            'heart_disease' => __('general.heart_disease'),
            'malaria' => __('general.malaria'),
            'operations' => __('general.operations'),
            'other' => __('general.other'),
        ];
    }

    public static function getCountryImage($data)
    {
        $image = '';
        if($data == 1){
            $image .= asset('assets/website/img/flag/singapore.png');
        } elseif ($data == 2){
            $image .= asset('assets/website/img/flag/myanmar.png');
        } elseif ($data == 3){
            $image .= asset('assets/website/img/flag/indonesia.png');
        } elseif ($data == 4){
            $image .= asset('assets/website/img/flag/philip.jpeg');
        } elseif ($data == 5){
            $image .= asset('assets/website/img/flag/cambodia.jpeg');
        } elseif ($data == 6){
            $image .= asset('assets/website/img/flag/india.png');
        } elseif ($data == 7){
            $image .= asset('assets/website/img/flag/mizoram.png');
        } elseif ($data == 8){
            $image .= asset('assets/website/img/flag/srilanka.png');
        } elseif ($data == 9){
            $image .= asset('assets/website/img/flag/bangladesh.png');
        } elseif ($data == 10){
            $image .= asset('assets/website/img/flag/malaysia.png');
        } elseif ($data == 11){
            $image .= asset('assets/website/img/flag/thailand.png');
        } elseif ($data == 12){
            $image .= asset('assets/website/img/flag/hong-kong.png');
        } elseif ($data == 13){
            $image .= asset('assets/website/img/flag/taiwan.png');
        } else {
            $image .= asset('assets/website/img/flag/other.png');
        }
        return $image;
    }

    public static function getInterview()
    {
        return  [
            'teleconference' => __('general.telephone_interview'),
            'videoconference' => __('general.videoconference_interview'),
            'person' => __('general.person_interview'),
            'observed_work' => __('general.observed_work_interview'),
        ];
    }

    public static function getBioDataImage($data)
    {
        $images = '';
        if(isset($data)){
            $images .= asset('storage/'.$data);
        } else {
            $images .= asset('assets/website/img/images/avater2.png');
        }
        return $images;
    }

    public static function getServicesForFooter()
    {
        return Services::get();
    }

    public static  function getContactDetail()
    {
        return SiteSetting::where('label','contact_details')->first();
    }

    public static function getPreferenceForRestDay($id = null): array|string
    {
        $data = [
            1 => '1 day/week',
            2 => '1 day/month',
            3 => '2 days/month',
            4 => '3 days/month',
            5 => '4 days/month',
            6 => 'Every Sunday',
            7 => 'Every Sunday + Public Holidays',
            8 => 'Every Sunday + Selected PH',
            9 => 'Negotiable',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getPet($id = null)
    {
        $data = [
            1 => 'Care Of Dog',
            2 => 'Care Of Cat',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getEducation($id = null)
    {
        $data = [
            1 => 'High School/Secondary/SMP',
            2 => 'Senior High School/SMA',
            3 => 'Vocational/SMK',
            4 => 'Diploma',
            5 => 'University Undergraduate',
            6 => 'University Graduate',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getBranch($id = null)
    {
        $data = [
            //1 => 'Orchard',
            1 => 'Kovan',
            2 => 'Clementi',
            3 => 'Toa Payoh',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getReligion($id = null)
    {
        $data = [
            1 => 'Buddhist',
            2 => 'Christian',
            3 => 'Hindu',
            4 => 'Islam',
            5 => 'Roman Catholic',
            6 => '7th Day Adventist',
            7 => 'Aglipayan',
            8 => 'Atheist',
            9 => 'Baptist',
            10 => 'Dating Daan',
            11 => 'Evangelical',
            12 => 'Free Thinker',
            13 => 'Iglesia Ni Cristo',
            14 => 'Jehova Witness',
            15 => 'Lutheran',
            16 => 'Methodist',
            17 => 'Orthodox',
            18 => 'Others',
            19 => 'Pente Costal',
            20 => 'Presbyterian',
            21 => 'Protestant',
            22 => 'Taoist',
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getFoodHandlingPreferences($id = null)
    {
        $data = [
            1 => __('general.chinese'),
            2 => __('general.malay'),
            3 => __('general.indonesian'),
            4 => __('general.indian'),
            5 => __('general.western'),
            6 => __('general.arabic'),
            7 => __('general.filipino'),
            8 => __('general.others'),
        ];
        if (!empty($id)) {
            $data = $data[$id];
        }
        return $data;
    }

    public static function getMail($name = null): array|string
    {
        $data = [
            'super_admin' => 'contact@maidcity.com.sg',
        ];
        if (!empty($name)) {
            $data = $data[$name];
        }
        return $data;
    }
}
