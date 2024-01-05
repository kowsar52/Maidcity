<div style="position: relative">
    <div class="w-50" style="position: absolute; left: 0">
        <img src="{{ \App\Services\GeneralService::getBioDataImage($model->photo) }}" alt="" class="w-90 max-he">
    </div>
    <div class="w-50" style="position: absolute; right: 0">
        <div class="border-top-4"></div>
        <table class="w-100 table-bottom-dot">
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.name')}}</th>
                <td class="border-bottom-dot">{{$model->name ?? 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.age')}}</th>
                <td class="border-bottom-dot">
                    <span>{{ isset($model->date_of_birth) ? \Carbon\Carbon::parse($model->date_of_birth)->format('d/m/Y') : 'N/A' }}</span>
                    <span
                        class="ms-5">{{isset($model->age) ? '/'. $model->age.' ' .__('general.years_old') : 'N/A'}}</span>
                </td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.height')}}</th>
                <td class="border-bottom-dot">{{isset($model->height) ? $model->height.' '. __('general.height_cm') : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.weight')}}</th>
                <td class="border-bottom-dot">{{isset($model->weight) ? $model->weight.' '. __('general.weight_kg') : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.martial_status')}}</th>
                <td class="border-bottom-dot">{{isset($model->marital_status) ? \App\Services\GeneralService::maritalStatusForDropdown($model->marital_status) : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.nationality')}}</th>
                <td class="border-bottom-dot">{{ isset($model->nationality) ? \App\Services\GeneralService::nationalityForDropdown($model->nationality) : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.religion')}}</th>
                <td class="border-bottom-dot">{{ $model->religion ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.education')}}</th>
                <td class="border-bottom-dot">{{ $model->education_level ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.no_of_children')}}</th>
                @if($model->no_of_children == 1)
                    <td class="border-bottom-dot">{{ isset($model->no_of_children) ? $model->no_of_children.' Children' : 'N/A' }}</td>
                @else
                    <td class="border-bottom-dot">{{ isset($model->no_of_children) ? $model->no_of_children.' Childrens' : 'N/A' }}</td>
                @endif
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.off_days')}}</th>
                <td class="border-bottom-dot">
                    @foreach($model->workExperienceWithEmployers as $data)
                        <span >{{ $data->off_days_given ?? 'N/A'}}@if (!$loop->last),@endif</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.expected_salary')}}</th>
                <td class="border-bottom-dot">
                    @foreach($model->workExperienceWithEmployers as $data)
                        <span >${{ $data->salary ?? 'N/A'}}@if (!$loop->last),@endif</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="w-50 border-bottom-dot">{{__('general.language')}}</th>
                <td class="border-bottom-dot">
                    @foreach($model->languageAbilities as $data)
                        <strong style="font-size: 11px">{{isset($data->language_id) ? \App\Services\GeneralService::languageForDropdown($data->language_id) : 'N/A'}}:
                            {!! isset($data->rating) ? \App\Services\GeneralService::fiveStar($data->rating) : 'N/A'  !!}
                        </strong>
                        <br>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>
<footer>
    <div class="page-number"></div>
</footer>
