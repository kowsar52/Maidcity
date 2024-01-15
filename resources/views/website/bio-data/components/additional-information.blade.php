<div class="mt-4 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.additional_information')}}</h4>
    <table class="table table-bordered">
        <thead class="table-primary-dark text-white">
{{--        <tr>--}}
{{--            <th colspan="3"></th>--}}
{{--            <th class="text-center">{{__('general.assessment_observations')}}</th>--}}
{{--        </tr>--}}
        <tr>
            <th class="w-50 text-center">{{__('general.area_of_work')}}</th>
            <th class="text-center">{{__('general.willingness')}}</th>
            <th class="text-center">{{__('general.experience')}}</th>
{{--            <th class="text-center w-25"><span><small class="small-color">Rate your skills: 1 = weak &amp; 5 = very good</small></span></th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="3">
                <h5 class="text-dark mb-0">{{__('general.child_care')}}</h5>
            </td>
        </tr>
        @forelse($model->careOfInfantChildrens as $childs)
            <tr>
                <td>{{ isset($childs->skill_title) ? \App\Services\GeneralService::getInfantChildDropdown($childs->skill_title) : ''}}</td>
                <td class="text-center">{!! (isset($childs->willingness) && $childs->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
                <td class="text-center">{!! (isset($childs->experience) && $childs->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
{{--                <td>{!! isset($childs->assessment) ? \App\Services\GeneralService::fiveStar($childs->assessment) : 'N/A'  !!}</td>--}}
            </tr>
        @empty
            <td colspan="4" class="text-center">No record found</td>
        @endforelse
        <tr>
            <td colspan="3">
                <h5 class="text-dark mb-0">{{__('general.general_housework')}}</h5>
            </td>
        </tr>
        @forelse($model->generalHouseworks as $data)
            <tr>
                <td>{{ isset($data->work_title) ? \App\Services\GeneralService::getGeneralHouseworkDropdown($data->work_title) : ''}}</td>
                <td class="text-center">
                    -
                    {{--{!! (isset($data->willingness) && $data->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}--}}
                </td>
                <td class="text-center">{!! (isset($data->experience) && $data->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
{{--                <td>{!! isset($data->assessment) ? \App\Services\GeneralService::fiveStar($data->assessment) : 'N/A'  !!}</td>--}}
            </tr>
        @empty
            <td colspan="4" class="text-center">No record found</td>
        @endforelse
        <tr>
            <td colspan="3">
                <h5 class="text-dark mb-0">{{__('Care of pets')}}</h5>
            </td>
        </tr>
        @forelse($model->careOfPet as $petCare)
            <tr>
                <td>{{ isset($petCare->pet_title) ? \App\Services\GeneralService::getGeneralPetCareDropdown($petCare->pet_title) : ''}}</td>
                <td class="text-center">
                    {!! (isset($petCare->willingness) && $petCare->willingness == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                </td>
                <td class="text-center">{!! (isset($petCare->experience) && $petCare->experience == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</td>
            </tr>
        @empty
            <td colspan="4" class="text-center">No record found</td>
        @endforelse
        </tbody>
    </table>
</div>
