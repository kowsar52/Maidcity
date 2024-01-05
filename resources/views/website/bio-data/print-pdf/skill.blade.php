<div class="mt-4">
    <h4 class="card-heading">{{__('general.skills')}}</h4>
    <table class="w-100" style=" border: 1px solid; border-collapse: collapse">
        <thead>
        <tr>
            <th colspan="3" class="table-heading-color"></th>
            <th class="text-center table-heading-color">{{__('general.assessment_observations')}}</th>
        </tr>
        <tr>
            <th class="w-50 text-center table-heading-color">{{__('general.area_of_work')}}</th>
            <th class="text-center table-heading-color">{{__('general.willingness')}}</th>
            <th class="text-center table-heading-color">{{__('general.experience')}}</th>
            <th class="text-center w-50 table-heading-color" style="font-size: 0.6rem"><span><small class="small-color">Rate your skills: 1 = weak &amp; 5 = very good</small></span>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($model->skillEvaluations as $data)
            <tr>
                <td style="border: 1px solid;">{!! isset($data->area_of_work) ? \App\Services\GeneralService::getAreaOfWork($data->area_of_work).(!empty($data->name_dishes) ? '<br><b>'.__('general.please_specify_cuisines').'</b> :'.$data->name_dishes : '') : ''!!}</td>
                <td style="border: 1px solid; text-align: center;">{!! (isset($data->willingness) && $data->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td style="border: 1px solid; text-align: center;">{!! (isset($data->experience) && $data->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td style="border: 1px solid; text-align: center;">{!! isset($data->assessment) ? \App\Services\GeneralService::fiveStar($data->assessment) : 'N/A'  !!}</td>
            </tr>
        @endforeach

        @if($model->skillEvaluations->count() > 0)
            @foreach($model->languageAbilities as $lang)
                <tr>
                    <td style="border: 1px solid;">Language
                        skill: <Strong>{{isset($lang->language_id) ? \App\Services\GeneralService::languageForDropdown($lang->language_id) : 'N/A'}}</Strong>
                    </td>
                    <td style="border: 1px solid; text-align: center;">-</td>
                    <td style="border: 1px solid; text-align: center;">-</td>
                    <td style="border: 1px solid; text-align: center;">{!! isset($lang->rating) ? \App\Services\GeneralService::fiveStar($lang->rating) : 'N/A'  !!}</td>
                    @endforeach
                </tr>
                @endif
        </tbody>
    </table>
</div>
