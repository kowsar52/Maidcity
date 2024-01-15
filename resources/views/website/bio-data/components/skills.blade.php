<div class="mt-4 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.skills')}}</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-primary-dark text-white">
            <tr>
                <th colspan="3"></th>
                <th class="text-center">{{__('general.assessment_observations')}}</th>
            </tr>
            <tr>
                <th class="w-50 text-center">{{__('general.area_of_work')}}</th>
                <th class="text-center">{{__('general.willingness')}}</th>
                <th class="text-center">{{__('general.experience')}}</th>
                <th class="text-center w-25"><span><small
                            class="text-white">Rate your skills: 1 = weak &amp; 5 = very good</small></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($model->skillEvaluations as $data)
                <tr>
                    <td>
                        @if(isset($data->area_of_work))
                            {!! \App\Services\GeneralService::getAreaOfWork($data->area_of_work) !!}
                            @if(!empty($data->age_range))
                                <br><b>{{ __('general.age_range') }}:</b> {{ $data->age_range }}
                            @endif
                            @if(!empty($data->name_dishes))
                                <br><b>{{ __('general.dishes') }}:</b> {{ $data->name_dishes }}
                            @endif
                        @endif
                    </td>
                    <td class="text-center">{!! (isset($data->willingness) && $data->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                    <td class="text-center">{!! (isset($data->experience) && $data->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                    <td class="text-center">{!! isset($data->assessment) ? \App\Services\GeneralService::fiveStar($data->assessment) : 'N/A'  !!}</td>
                </tr>
            @endforeach

            @if($model->languageAbilities()->count() > 0)
                @foreach($model->languageAbilities as $lang)
                    <tr>
                        <td>Language: <strong>{{isset($lang->language_id) ? \App\Services\GeneralService::languageForDropdown($lang->language_id) : 'N/A'}}</strong></td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">{!! isset($lang->rating) ? \App\Services\GeneralService::fiveStar($lang->rating) : 'N/A'  !!}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
