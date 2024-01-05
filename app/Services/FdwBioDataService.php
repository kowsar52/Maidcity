<?php

namespace App\Services;

use App\Models\EmployerMDWRequirement;
use App\Models\FdwBioData;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FdwBioDataService
{
    public static function getFdwBioDataForDropdown()
    {
        return FdwBioData::where('status','published')->pluck('name','id');
    }
    public static function getAdvancedSearchData($request, $data)
    {
        if ($request->filled('nationality')){
            $data = $data->where('nationality', $request->get('nationality'));
        }
        if ($request->filled('bio_data_type')){
            $data = $data->whereJsonContains('bio_data_type', $request->get('bio_data_type'));
        }
        if ($request->filled('category')){
            $data = $data->whereHas('bioDataDetail',function ($query) use ($request) {
                $query->whereJsonContains('recommended_helper',$request->get('category'));
            });
        }
        if ($request->filled('experience_level')){
            if ($request->get('experience_level') == 1) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->whereColumn('country_id', '=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 2) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 1)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 3) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 12)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 4) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 13)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 5) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 10)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 6) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 14)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            } elseif ($request->get('experience_level') == 7) {
                $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->where('country_id', 15)
                        ->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
                });
            }
        }
        if ($request->filled('marital_status')){
            $data = $data->where('marital_status', $request->get('marital_status'));
        }
        if ($request->filled('languages')){
            $data = $data->whereHas('languageAbilities',function ($query) use ($request) {
                $query->where('language_id',$request->get('languages'));
            });
        }
        if ($request->filled('age_range')){
            if ($request->get('age_range') == 1){
                $data = $data->whereBetween('age',[23,29]);
            } elseif ($request->get('age_range') == 2){
                $data = $data->whereBetween('age',[30,35]);
            } elseif ($request->get('age_range') == 3){
                $data = $data->whereBetween('age',[35,39]);
            } elseif ($request->get('age_range') == 4){
                $data = $data->where('age','>',40);
            }
        }
        return $data;
    }

    public static function getBioDataForMdwRewquirement()
    {
        $data = FdwBioData::with('workExperienceWithEmployers', 'bioDataDetail')
            ->where('status', 'published');
       if (Auth::check() && Auth::user()->hasRole('Employer')){

           $mdwRequirement = EmployerMDWRequirement::where('user_id',Auth::id())->first();
           if (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer1','1')->exists()){
               $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                    $query->whereColumn('country_id', '=', DB::raw('fdw_bio_data.nationality'));
                });
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer1','2')->exists()){
               $data = $data->whereHas('workExperienceWithEmployers', function ($query) {
                   $query->whereColumn('country_id', '!=', DB::raw('fdw_bio_data.nationality'));
               });
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer1','3')->exists()){
               $data = $data->whereJsonContains('bio_data_type','4');
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer1','4')->exists()){
               $data = $data->whereJsonContains('bio_data_type','3');
           }
           if (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer2','1')->exists()){
               $data = $data->where('nationality',3);
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer2','2')->exists()){
               $data = $data->where('nationality',2);
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer2','4')->exists()){
               $data = $data->where('nationality',4);
           } elseif (isset($mdwRequirement) && $mdwRequirement->whereJsonContains('answer2','5')->exists()){
               $data = $data->where('nationality',7);
           }
           if (isset($mdwRequirement) && $mdwRequirement->answer3 != null){
               $data = $data->whereHas('bioDataDetail', function ($query) use ($mdwRequirement) {
                   $query->whereJsonContains('recommended_helper',$mdwRequirement->answer3);
               });
           }
       }
        return $data->latest()->take(10)->get();
    }

    public static function getPrefixId($id): string
    {
        $model = FdwBioData::findOrFail($id);
        if ($model->createdBy->getRoleNames()->first() === 'Supplier'){
            return $model->createdBy->supplier->prefix.$model->id;
        }
        return $model->id;
    }

    public static function getRecommendedMdws()
    {
        $recommended_mdws = SiteSetting::where('label','recommended_mdw')->first();
        if ($recommended_mdws){
            return FdwBioData::whereIn('id',$recommended_mdws->items)->latest()->get();
        }
        return [];
    }
}
