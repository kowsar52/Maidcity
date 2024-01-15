<div class="mt-4 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.medical_history')}}</h4>
    <div class="row mb-2">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.allergies')}} @isset($model->medicalHistory->allergies_detail) ({{ $model->medicalHistory->allergies_detail }}) @endisset
                    <span
                        class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->allergies) && $model->medicalHistory->allergies == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.physical_disabilities')}} @isset($model->medicalHistory->physical_disabilities_detail) ({{ $model->medicalHistory->physical_disabilities_detail }}) @endisset
                    <span
                        class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->physical_disabilities) && $model->medicalHistory->physical_disabilities == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.dietary_restrictions')}} @isset($model->medicalHistory->dietary_restrictions_detail) ({{ $model->medicalHistory->dietary_restrictions_detail }}) @endisset
                    <span class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->dietary_restrictions) && $model->medicalHistory->dietary_restrictions == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
    </div>
    <p class="fs-7 mb-2">{{__('general.past_existing_illness')}}:</p>
    <div class="row">
        @foreach(\App\Services\GeneralService::getMedicalHistry() as $key => $value)
            @php
                $past_existing_illness = (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness',$key)->where('fdw_bio_data_id',$model->id)->count() > 0) ? true : false;
            @endphp
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                        {{$value}}
                        <span class="badge fw-bold rounded-pill fs-6">{!! ($past_existing_illness === true) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    <span>
                        {{__('general.food_handling_preferences')}}
                        @isset($model->medicalHistory->food_handling_preferences)
                        <div class="d-flex">
                            @foreach ($model->medicalHistory->food_handling_preferences as $food_)
                                {{ str_replace('_', ' ', $food_) }}
                                @if(!$loop->last), @endif
                            @endforeach
                        </div>
                        @endisset
                    </span>
                    <span class="badge fw-bold rounded-pill fs-6">{!! isset($model->medicalHistory->food_handling_preferences) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                        {{__('general.other_food_handling_preferences')}}
                        @isset($model->medicalHistory->other_food_handling_preferences)
                        ({{ $model->medicalHistory->other_food_handling_preferences }})
                        @endisset
                    <span class="badge fw-bold rounded-pill fs-6">{!! isset($model->medicalHistory->other_food_handling_preferences) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
