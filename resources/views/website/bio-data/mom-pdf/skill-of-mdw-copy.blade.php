<div class="mt-4">
    <h4 class="card-heading">{{__('general.skills_of_fdw')}}</h4>
    <h4 style="font-size: 0.9rem; font-weight: bold; margin-bottom: 2px">{{__('general.method_of_evaluation_of_skills')}}</h4>
    <p>{{__('general.fdw_skill_title')}}</p>
    <table>
        <tr>
            <th class="pr-0">
                {{html()->checkbox('based_on_fdw')->checked((isset($model->method_of_evaluation_of_skills) && $model->method_of_evaluation_of_skills == 'based_on_fdw') ? 'checked' : '') }}
            </th>
            <td class="pl-1px">
                {{html()->label(__('general.based_on_fdw'))->for('based_on_fdw')}}
            </td>
        </tr>
        <tr>
            <th class="pr-0 pb-0">
                {{html()->checkbox()->checked((isset($model->method_of_evaluation_of_skills) && $model->method_of_evaluation_of_skills == 'interview_by_singapore') ? 'checked' : '') }}
            </th>
            <td class="pl-1px pb-0">
                {{html()->label(__('general.interview_by_singapore'))}}
            </td>
        </tr>
    </table>

    <table class="ms-table">
        @foreach(\App\Services\GeneralService::getInterview()  as $key => $value )
            @php
                $interview_by_singapore_via = (isset($model->interview_by_singapore_via) && $model->whereJsonContains('interview_by_singapore_via',$key)->where('id',$model->id)->count() > 0) ? true : false;
            @endphp
            <tr >
                <th class="pr-0 pt-0 pb-0">
                    {{html()->checkbox()->checked((($interview_by_singapore_via === true) ? 'checked' : '')) }}
                </th>
                <td class="pl-1px pt-0 pb-0">
                    {{html()->label($value)}}
                </td>
            </tr>
        @endforeach
    </table>

    <table>
        <tr>
            <th class="pr-0 pb-0">
                {{html()->checkbox('based_on_fdw')->checked((isset($model->method_of_evaluation_of_skills) && $model->method_of_evaluation_of_skills == 'interview_by_overseas_training_centre') ? 'checked' : '') }}
            </th>
            <td class="pl-1px pb-0">
                {{html()->label(__('general.interview_by_overseas_training_centre'))->for('based_on_fdw')}}
            </td>
        </tr>
    </table>
    <table >
        <tr>
            <td class="pr-0 pb-0 pt-0">
                ({{__('general.name_of_foreign_training_centre')}}:__________________)
            </td>
        </tr>
    </table>
    <table >
        <tr>
            <td class="pr-0 pb-0 pt-0">
                {{__('general.if_third_party_is_certified')}}:__________________
            </td>
        </tr>
    </table>
    <table class="ms-table">
        @foreach(\App\Services\GeneralService::getInterview()  as $key => $value )
            @php
                $interview_by_overseas_training_centre_via = (isset($model->interview_by_overseas_training_centre_via) && $model->whereJsonContains('interview_by_overseas_training_centre_via',$key)->where('id',$model->id)->count() > 0) ? true : false;
            @endphp
            <tr >
                <th class="pr-0 pt-0 pb-0">
                    {{html()->checkbox()->checked((($interview_by_overseas_training_centre_via === true) ? 'checked' : '')) }}
                </th>
                <td class="pl-1px pt-0 pb-0">
                    {{html()->label($value)}}
                </td>
            </tr>
        @endforeach
    </table>

    <table class="w-100" style=" border: 1px solid; border-collapse: collapse;margin-top: 10px;">
        <thead>
        <tr>
            <th class="w-50 text-center table-gray" style="border: 1px solid;">{{__('general.area_of_work')}}</th>
            <th class="text-center table-gray" style="border: 1px solid;">{{__('general.willingness')}} <br> {{__('general.yes')}}/{{__('general.no')}}</th>
            <th class="text-center table-gray" style="border: 1px solid;">{{__('general.experience')}} <br> {{__('general.yes')}}/{{__('general.no')}} <br> {{__('general.if_yes')}}</th>
            <th class="text-center table-gray" style="border: 1px solid;"  >{{__('general.assessment_observations')}} <br> {{__('general.qualitative')}} <br>  {{__('general.poor')}} <br> {{__('general.rate')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($model->skillEvaluations as $data)
            <tr>
                <td style="border: 1px solid;">{{ isset($data->area_of_work) ? \App\Services\GeneralService::getAreaOfWork($data->area_of_work) : ''}}</td>
                <td style="border: 1px solid;">{!! (isset($data->willingness) && $data->willingness == 1) ? 'Yes' : 'No' !!}</td>
                <td style="border: 1px solid;">{!! (isset($data->experience) && $data->experience == 1) ? 'Yes' : 'No' !!}</td>
                <td style="border: 1px solid;">{!! isset($data->assessment) ? \App\Services\GeneralService::fiveStar($data->assessment) : 'N/A'  !!}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">{{('general.no_record_found')}}</td>
            </tr>
        @endforelse

            @if($model->skillEvaluations->count() > 0)
                @foreach($model->languageAbilities as $lang)
                    <tr>
                        <td style="border: 1px solid;">
                            Language skill: <strong>{{isset($lang->language_id) ? \App\Services\GeneralService::languageForDropdown($lang->language_id) : 'N/A'}}</strong>
                        </td>
                        <td style="border: 1px solid;">-</td>
                        <td style="border: 1px solid;">-</td>
                        <td style="border: 1px solid;">{!! isset($lang->rating) ? \App\Services\GeneralService::fiveStar($lang->rating) : 'N/A'  !!}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
