<div class="mt-4">
    <h4 class="card-heading">{{__('general.additional_information')}}</h4>
    <table class="w-100" style=" border: 1px solid; border-collapse: collapse">
        <thead >
        {{--        <tr>--}}
        {{--            <th colspan="3"></th>--}}
        {{--            <th class="text-center">{{__('general.assessment_observations')}}</th>--}}
        {{--        </tr>--}}
        <tr>
            <th class="w-50 text-center table-heading-color">{{__('general.area_of_work')}}</th>
            <th class="text-center table-heading-color" >{{__('general.willingness')}}</th>
            <th class="text-cente table-heading-colorr table-heading-color" >{{__('general.experience')}}</th>
            {{--            <th class="text-center w-25"><span><small class="small-color">Rate your skills: 1 = weak &amp; 5 = very good</small></span></th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="fw-bold" colspan="3">{{__('general.child_care')}}</td>
        </tr>
        @forelse($model->careOfInfantChildrens as $childs)
            <tr>
                <td style="border: 1px solid;">{{ isset($childs->skill_title) ? \App\Services\GeneralService::getInfantChildDropdown($childs->skill_title) : ''}}</td>
                <td style="border: 1px solid; text-align: center;">{!! (isset($childs->willingness) && $childs->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td style="border: 1px solid; text-align: center;">{!! (isset($childs->experience) && $childs->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                {{--                <td>{!! isset($childs->assessment) ? \App\Services\GeneralService::fiveStar($childs->assessment) : 'N/A'  !!}</td>--}}
            </tr>
        @empty
            <td colspan="3" class="text-center" style="border: 1px solid;">No record found</td>
        @endforelse
        <tr>
            <td class="fw-bold" colspan="3">{{__('general.general_housework')}}</td>
        </tr>
        @forelse($model->generalHouseworks as $data)
            <tr>
                <td style="border: 1px solid;">{{ isset($data->work_title) ? \App\Services\GeneralService::getGeneralHouseworkDropdown($data->work_title) : ''}}</td>
                <td style="border: 1px solid; text-align: center;">
                    -
                    {{--{!! (isset($data->willingness) && $data->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}--}}
                </td>
                <td style="border: 1px solid; text-align: center;">{!! (isset($data->experience) && $data->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                {{--                <td>{!! isset($data->assessment) ? \App\Services\GeneralService::fiveStar($data->assessment) : 'N/A'  !!}</td>--}}
            </tr>
        @empty
            <td colspan="3" class="text-center" style="border: 1px solid;">No record found</td>
        @endforelse
        </tbody>
    </table>
</div>
<footer>
    <div class="page-number"></div>
</footer>
