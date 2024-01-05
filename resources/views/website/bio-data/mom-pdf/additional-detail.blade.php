@include('website.bio-data.mom-pdf.components.header')
<table cellpadding="0" cellspacing="0" class="table" style="font-size: 19px;">
    <tr>
        <td>
            <b>{{__('general.additional_details_of_fdw')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="font-size: 17px; border: 1px solid;">
    <tr>
        <td style="padding: 9px 3px; background-color: lightgray;">
            <b>(A) {{__('general.profile_of_fdw')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 50%; padding-right: 9px;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                    <td style="width: 39%;">{{__('general.birth_order_in_family')}}:</td>
                    <td style="width: 61%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->birth_order_in_family ?? '' }}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                    <td style="width: 15%;">{{__('general.others')}}:</td>
                    <td style="width: 85%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->others ?? '' }}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 50%; padding-right: 9px;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                    <td style="width: 23%;">{{__('general.basic_salary')}}:</td>
                    <td style="width: 77%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->bioDataDetail->basic_salary ?? '' }}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 50%;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                <tr>
                    <td style="width: 29%;">{{__('general.special_mention')}}:</td>
                    <td style="width: 71%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->bioDataDetail->special_mention ?? '' }}
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="font-size: 17px; border: 1px solid;">
    <tr>
        <td style="padding: 9px 3px; background-color: lightgray;">
            <b>(B) {{__('general.skills_of_fdw')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tr>
        <td>
            <b>1 {{__('general.care_of_infant_child')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <thead>
    <tr>
        <th style="width: 60%;"></th>
        <!--<th style="width: 20%; text-align: center;">{{ __('general.willingness') }}</th>-->
        <th style="width: 20%; text-align: center;">{{ __('general.experience') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($model->careOfInfantChildrens as $care_of_infant_child)
        <tr>
            <td style="padding: 3px;">{{ \App\Services\GeneralService::getInfantChildDropdown($care_of_infant_child->skill_title) }}</td>
            <!--<td style="text-align: center;padding: 3px;">{{ ($care_of_infant_child->willingness == 1) ? __('general.yes') : __('general.no') }}</td>-->
            <td style="text-align: center;padding: 3px;">{{ ($care_of_infant_child->experience == 1) ? __('general.yes') : __('general.no') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tr>
        <td>
            <b>2 {{__('general.general_housework')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <thead>
    <tr>
        <th style="width: 60%;"></th>
        <!--<th style="width: 20%; text-align: center;">{{ __('general.willingness') }}</th>-->
        <th style="width: 20%; text-align: center;">{{ __('general.experience') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($model->generalHouseworks as $general_housework)
        <tr>
            <td style="padding: 3px;">{{ \App\Services\GeneralService::getGeneralHouseworkDropdown($general_housework->work_title) }}</td>
            <!--<td style="text-align: center;padding: 3px;">{{ ($general_housework->willingness == 1) ? __('general.yes') : __('general.no') }}</td>-->
            <td style="text-align: center;padding: 3px;">{{ ($general_housework->experience == 1) ? __('general.yes') : __('general.no') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{--<table cellpadding="0" cellspacing="0" class="table">
    <tr>
        <td>
            <b>3 {{__('general.language_abilities')}}</b>
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    @foreach($model->languageAbilities as $language_abilities)
        <tr>
            <td style="width: 1%;">
                {{ $loop->iteration.'.' }}
            </td>
            <td style="width: 19%;">
                <div style="border-bottom: 1px solid;">
                    {{ \App\Services\GeneralService::languageForDropdown($language_abilities->language_id) }}
                </div>
            </td>
            <td style="width: 80%; padding-left: 15px;">{{ $language_abilities->rating ?? '' }}</td>
        </tr>
    @endforeach
</table>--}}
<table cellpadding="0" cellspacing="0" class="table" style="font-size: 17px; border: 1px solid;">
    <tr>
        <td style="padding: 9px 3px; background-color: lightgray;">
            <b>(C) {{__('general.work_experience')}}</b>
        </td>
    </tr>
</table>
@foreach($model->workExperienceWithEmployers as $work_experience)
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                <b>{{__('general.name_of_employer').' ('.$loop->iteration.')' }}</b>
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->name_of_employer ?? '' }}
                </div>
            </td>
            <td style="width: 25%; padding: 5px;">
                {{(isset($work_experience->present) && $work_experience->present == 1) ? __('general.from_date') : __('general.date_from_to') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    @if(isset($work_experience->present) && $work_experience->present == 1)
                        {{ \Carbon\Carbon::parse($work_experience->from_date)->format('d/m/Y') }}
                    @else
                        {{ \Carbon\Carbon::parse($work_experience->from_date)->format('d/m/Y').' - '.\Carbon\Carbon::parse($work_experience->to_date)->format('d/m/Y') }}
                    @endif
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.country_of_work') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ isset($work_experience->country_id) ? \App\Services\GeneralService::countryForDropdown($work_experience->country_id) : '' }}
                </div>
            </td>
            <td style="width: 25%; padding: 5px;">
                {{__('general.nationality_race') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->nationality ?? '' }}
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.language_used') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->language ?? '' }}
                </div>
            </td>
            <td style="width: 25%; padding: 5px;">
                {{__('general.type_of_house') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->type_of_house ?? '' }}
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.members_in_family') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->members_in_family ?? '' }}
                </div>
            </td>
            <td style="width: 25%; padding: 5px;">
                {{__('general.starting_last_salary') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->salary ?? '' }}
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.age_of_children_elderly') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->age_of_children ?? '' }}
                </div>
            </td>
            <td style="width: 25%; padding: 5px;">
                {{__('general.off_day_given') }}:
            </td>
            <td style="width: 25%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->off_days_given	 ?? '' }}
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.duties_detail') }}:
            </td>
            <td colspan="3" style="width: 75%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->duties_detail ?? '' }}
                </div>
            </td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="table">
        <tr>
            <td style="width: 25%; padding: 5px;">
                {{__('general.reason_for_leaving') }}:
            </td>
            <td colspan="3" style="width: 75%; padding: 5px;">
                <div style="border-bottom: 1px solid;">
                    {{ $work_experience->reason_for_leaving ?? '' }}
                </div>
            </td>
        </tr>
    </table>
@endforeach
<div class="page-break"></div>
@include('website.bio-data.mom-pdf.components.header')
{{--<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td colspan="7">
            <b>{{ __('general.what_is_your_preference_of_work').':'.__('general.most_least_preferred') }}</b>
        </td>
    </tr>
</table>
<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td style="width:65%; padding:0 9px 0 0;">
            <div style="width: 19%; float: left;">
                {{ __('general.care_of_babies') }}
            </div>
            <div style="width: 81%; float: right; border-bottom: 1px dotted; padding-top: 15px;"></div>
        </td>
        <td style="width: 5%;">1</td>
        <td style="width: 5%;">2</td>
        <td style="width: 5%;">3</td>
        <td style="width: 5%;">4</td>
        <td style="width: 5%;">5</td>
    </tr>
</table>
<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td style="width:65%; padding:0 9px 0 0;">
            <div style="width: 21%; float: left;">
                {{ __('general.care_of_children') }}
            </div>
            <div style="width: 79%; float: right; border-bottom: 1px dotted; padding-top: 15px;"></div>
        </td>
        <td style="width: 5%;">1</td>
        <td style="width: 5%;">2</td>
        <td style="width: 5%;">3</td>
        <td style="width: 5%;">4</td>
        <td style="width: 5%;">5</td>
    </tr>
</table>
<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td style="width:65%; padding:0 9px 0 0;">
            <div style="width: 11%; float: left;">
                {{ __('general.cooking') }}
            </div>
            <div style="width: 89%; float: right; border-bottom: 1px dotted; padding-top: 15px;"></div>
        </td>
        <td style="width: 5%;">1</td>
        <td style="width: 5%;">2</td>
        <td style="width: 5%;">3</td>
        <td style="width: 5%;">4</td>
        <td style="width: 5%;">5</td>
    </tr>
</table>
<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td style="width:65%; padding:0 9px 0 0;">
            <div style="width: 25%; float: left;">
                {{ __('general.routine_house_work') }}
            </div>
            <div style="width: 75%; float: right; border-bottom: 1px dotted; padding-top: 15px;"></div>
        </td>
        <td style="width: 5%;">1</td>
        <td style="width: 5%;">2</td>
        <td style="width: 5%;">3</td>
        <td style="width: 5%;">4</td>
        <td style="width: 5%;">5</td>
    </tr>
</table>
<table class="table" style="margin-bottom: 9px;">
    <tr>
        <td style="width:65%; padding:0 9px 0 0;">
            <div style="width: 31%; float: left;">
                {{ __('general.care_of_special_child') }}
            </div>
            <div style="width: 69%; float: right; border-bottom: 1px dotted; padding-top: 15px;"></div>
        </td>
        <td style="width: 5%;">1</td>
        <td style="width: 5%;">2</td>
        <td style="width: 5%;">3</td>
        <td style="width: 5%;">4</td>
        <td style="width: 5%;">5</td>
    </tr>
</table>--}}
<table cellpadding="0" cellspacing="0" class="table" style="font-size: 17px; border: 1px solid;">
    <tr>
        <td style="padding: 9px 3px; background-color: lightgray;">
            <b>(D) {{ __('general.this_helper_recommended_for') }}</b>
        </td>
    </tr>
</table>
@foreach(\App\Services\GeneralService::categoryForDropdown() as $key => $recommended_helper)
    <div>
        <input type="checkbox" {{ $model->bioDataDetail->where('fdw_bio_data_id',$model->id)->whereJsonContains('recommended_helper',$key)->exists() ? 'checked' : '' }} style="line-height: 0;">
        <label for="">{{ $recommended_helper }}</label>
    </div>
@endforeach
