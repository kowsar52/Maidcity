<div class="row mt-4">
    <div class="col-md-4">
        <img src="{{ \App\Services\GeneralService::getBioDataImage($model->photo) }}" alt="" class="w-100 rounded-4 max-he">
    </div>
    <div class="col-md-8 @guest filter @endguest">
        <table class="table lh-lg border-top-4">
            <tr>
                <th class="w-50">{{__('general.ref_no')}}</th>
                <td class="text-danger">{{ \App\Services\FdwBioDataService::getPrefixId($model->id) }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.name')}}</th>
                <td>{{$model->name ?? 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.date_of_birth_age')}}</th>
                <td>
                    <div class="d-flex">
                        <span>{{ isset($model->date_of_birth) ? \Carbon\Carbon::parse($model->date_of_birth)->format('d/m/Y') : 'N/A' }}</span>
                        <span class="text-center flex-grow-1">{{isset($model->age) ? $model->age.' ' .__('general.years_old') : 'N/A'}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.height')}}</th>
                <td>{{isset($model->height) ? $model->height.'cm' : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.weight')}}</th>
                <td>{{isset($model->weight) ? $model->weight.'kg' : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.no_of_siblings')}}</th>
                <td>{{ isset($model->number_of_siblings) ? $model->number_of_siblings : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.martial_status')}}</th>
                <td>{{isset($model->marital_status) ? \App\Services\GeneralService::maritalStatusForDropdown($model->marital_status) : 'N/A'}}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.no_of_children')}}</th>
                <td>{{ isset($model->no_of_children) ? $model->no_of_children : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('Age of Children')}}</th>
                <td>{{ isset($model->age_of_children) ? $model->age_of_children : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.nationality')}}</th>
                <td>{{ isset($model->nationality) ? \App\Services\GeneralService::nationalityForDropdown($model->nationality) : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.religion')}}</th>
                <td>{{ isset($model->religion) ? \App\Services\GeneralService::getReligion($model->religion) : 'N/A' }}</td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.education')}}</th>
                <td>{{ isset($model->education_level) ? \App\Services\GeneralService::getEducation($model->education_level) : 'N/A' }}</td>
            </tr>

            <tr>
                <th class="w-50">{{__('general.off_days')}}</th>
                <td>
                    {{ isset($model->bioDataDetail->preference_for_rest_day) ? \App\Services\GeneralService::getPreferenceForRestDay($model->bioDataDetail->preference_for_rest_day) : 'N/A' }}
                </td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.basic_salary')}}</th>
                <td>
                    ${{ $model->bioDataDetail->basic_salary ?? 'N/A' }}
                </td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.language')}}</th>
                <td>
                    @forelse($model->languageAbilities as $data)
                        <strong>{{isset($data->language_id) ? \App\Services\GeneralService::languageForDropdown($data->language_id) : 'N/A'}}
                            {!! isset($data->rating) ? ' : '.\App\Services\GeneralService::fiveStar($data->rating) : ''  !!}
                        </strong>
                        <br>
                    @empty
                        <span>N/A</span>
                    @endforelse
                </td>
            </tr>
            <tr>
                <th class="w-50">{{__('general.special_mention')}}</th>
                <td>
                    {{ $model->bioDataDetail->special_mention ?? 'N/A' }}
                </td>
            </tr>
        </table>
    </div>
</div>
