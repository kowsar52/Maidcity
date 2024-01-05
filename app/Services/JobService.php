<?php

namespace App\Services;

use Carbon\Carbon;

class JobService
{
    public static function typeOfMDW($id = null)
    {
        $data = [
            1 => 'New/Fresh MDWs',
            2 => 'Experienced MDWs',
            3 => 'Transfer MDWs',
            4 => 'Caregivers',
            5 => 'No Preference',
        ];
        if (!is_null($id)){
            $data = $data[$id];
        }
        return $data;
    }

    public static function nationalityPreferred($id = null)
    {
        $data = [
            1 => __('general.indonesian'),
            2 => __('general.myanmar'),
            3 => __('general.no_preference'),
            4 => __('general.filipino'),
            5 => __('general.mizoram'),
        ];
        if (!is_null($id)){
            $data = $data[$id];
        }
        return $data;
    }
}
