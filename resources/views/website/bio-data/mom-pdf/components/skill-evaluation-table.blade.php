<table border="1" cellpadding="7" cellspacing="0" class="table">
    <thead style="text-align: center; background-color: lightgray;">
    <tr>
        <td style="width: 10%;"><b>S/No</b></td>
        <td style="width: 30%;"><b>{{ __('general.area_of_work') }}</b></td>
        <td style="width: 15%;">
            <b>{{ __('general.willingness') }}</b>
            <br>
            Yes/No
        </td>
        <td style="width: 15%;">
            <b>{{ __('general.experience') }}</b>
            <br>
            Yes/No
            <br>
            If yes, state the no. of years
        </td>
        <td style="width: 30%;">
            <b>{{ __('general.assessment_observations') }}</b>
            <br>
            Please state qualitative observations of FDW and/or rate the
            FDW (indicate N.A. of no evaluation was done)
            <br>
            Poor ……………………Excellent...N.A
            <br>
            1 2 3 4 5 N.A
        </td>
    </tr>
    </thead>
    <tbody>
    @php
        $sr_no = 1;
    @endphp
    @if(isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->whereIn('method_of_evaluation_of_skills',['based_on_fdw','interview_by_singapore','interview_by_overseas_training_centre'])->count() > 0)
        @foreach($model->skillEvaluations as $skill)
            <tr>
                <td>{{ $sr_no++ }}.</td>
                <td>
                    <div style="margin-bottom: 15px;">
                        {{ \App\Services\GeneralService::getAreaOfWork($skill->area_of_work) }}
                    </div>
                    @if($skill->area_of_work == 1)
                        {{ __('general.please_specify_age_range') }}:
                        <div style="border-bottom: 1px solid; padding-top: 9px;">
                            {{ $skill->age_range ?? '' }}
                        </div>
                    @elseif($skill->area_of_work == 5)
                        <div style="margin-bottom: 15px;">
                            {{ __('general.please_specify_cuisines') }}:
                            {{ $skill->name_dishes ?? '' }}
                        </div>
                    @endif
                </td>
                <td style="text-align: center;">
                    {{ ($skill->willingness == 1) ? 'Yes' : 'No' }}
                </td>
                <td style="text-align: center;">
                    {{ ($skill->experience == 1) ? 'Yes' : 'No' }}
                </td>
                <td style="text-align: center;">
                    {!! isset($skill->assessment) ? \App\Services\GeneralService::fiveStar($skill->assessment) : 'N/A'  !!}
                </td>
            </tr>
        @endforeach
    @endif
    @foreach($model->languageAbilities as $language)
        <tr>
            <td>{{ $sr_no++ }}.</td>
            <td>
                <div style="margin-bottom: 15px;">
                    {{ __('general.language_abilities') }}
                </div>
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 9px;">
                    <tbody>
                    <tr>
                        <td style="width: 51%;">{{ __('general.please_specify') }}:</td>
                        <td style="width: 49%;">
                            <div style="border-bottom: 1px solid;">
                                {{ isset($language->language_id) ? \App\Services\GeneralService::languageForDropdown($language->language_id) : '' }}
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td style="text-align: center;">-</td>
            <td style="text-align: center;">-</td>
            <td style="text-align: center;">
                {!! isset($language->rating) ? \App\Services\GeneralService::fiveStar($language->rating) : 'N/A'  !!}
            </td>
        </tr>
    @endforeach
    <tr>
        <td>{{ $sr_no++ }}.</td>
        <td>
            <div style="margin-bottom: 15px;">
                {{ __('general.other_skills_if_any') }}
            </div>
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 9px;">
                <tbody>
                <tr>
                    <td style="width: 51%;">{{ __('general.please_specify') }}:</td>
                    <td style="width: 49%;">
                        <div style="border-bottom: 1px solid; padding: 9px;">
                            {{ $model->other_skill ?? '' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>
