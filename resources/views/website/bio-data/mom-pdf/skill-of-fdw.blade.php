<div>
    <h4 class="card-heading">{{__('general.skills_of_fdw')}}</h4>
    <table class="w-100">
        <tr>
            <th colspan="3">{{__('general.care_if_infants_children')}}</th>
        </tr>
        <tr>
            <th class="w-50"></th>
            <th class="text-center">{{__('general.willingness')}}</th>
            <th class="text-center">{{__('general.experience')}}</th>
        </tr>
        @forelse($model->careOfInfantChildrens as $childs)
            <tr>
                <td class="w-50">{{ isset($childs->skill_title) ? \App\Services\GeneralService::getInfantChildDropdown($childs->skill_title) : ''}}</td>
                <td class="text-center">{!! (isset($childs->willingness) && $childs->willingness == 1) ? 'Yes' : 'No' !!}</td>
                <td class="text-center">{!! (isset($childs->experience) && $childs->experience == 1) ? 'Yes' : 'No' !!}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">{{__('general.no_record_found')}}</td>
            </tr>
        @endforelse
    </table>

    <table class="w-100">
        <tr>
            <th colspan="3">{{__('general.general_housework')}}</th>
        </tr>
        <tr>
            <th class="w-50"></th>
            <th class="text-center">{{__('general.willingness')}}</th>
            <th class="text-center">{{__('general.experience')}}</th>
        </tr>
        @forelse($model->generalHouseworks as $data)
            <tr>
                <td class="w-50">{{ isset($data->work_title) ? \App\Services\GeneralService::getGeneralHouseworkDropdown($data->work_title) : ''}}</td>
                <td class="text-center">{!! (isset($data->willingness) && $data->willingness == 1) ? 'Yes' : 'No' !!}</td>
                <td class="text-center">{!! (isset($data->experience) && $data->experience == 1) ? 'Yes' : 'No' !!}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">{{__('general.no_record_found')}}</td>
            </tr>
        @endforelse
    </table>

    <table>
        <tr>
            <th>{{__('general.language_abilities')}}</th>
        </tr>
        @foreach($model->languageAbilities as $lang)
            <tr>
                <td><span class="border-bottom">{{isset($lang->language_id) ? \App\Services\GeneralService::languageForDropdown($lang->language_id) : 'N/A'}}</span>
                </td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>{{__('general.provide_rating')}}</td>
            </tr>
        @endforeach
        <tr>
            <td><span class="border-bottom" style="color: white">{{__('general.text_hidden')}}</span></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>{{__('general.provide_rating')}}</td>
        </tr>
        <tr>
            <td><span class="border-bottom" style="color: white">{{__('general.text_hidden')}}</span></td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>{{__('general.provide_rating')}}</td>
        </tr>
    </table>
</div>
