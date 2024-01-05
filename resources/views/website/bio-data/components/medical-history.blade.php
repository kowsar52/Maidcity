<div class="mt-4 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.medical_history')}}</h4>
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.allergies_if_any')}}
                    <span
                        class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->allergies) && $model->medicalHistory->allergies == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.physical_disabilities')}}
                    <span
                        class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->physical_disabilities) && $model->medicalHistory->physical_disabilities == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-items d-flex justify-content-between align-items-center">
                    {{__('general.physical_disabilities')}}
                    <span class="badge fw-bold rounded-pill fs-6">{!! (isset($model->medicalHistory->dietary_restrictions) && $model->medicalHistory->dietary_restrictions == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
    </div>
    <p class="fs-7 mt-2">{{__('general.past_existing_illness')}}:</p>
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
                    {{__('general.food_handling_preferences')}}
                    <span class="badge fw-bold rounded-pill fs-6">{!! isset($model->medicalHistory->food_handling_preferences) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
