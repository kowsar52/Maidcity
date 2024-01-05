<div>
    <h4 class="card-heading">{{__('general.medical_history')}}</h4>
    <table class="w-100">
        <tr>
            <td style="width: 33.33%; padding-right: 10px">
                <div class="list-items">
                    <span class="position-left">
                        {{__('general.allergies_if_any')}}
                    </span>
                    <span class="position-right">
                        {!! (isset($model->medicalHistory->allergies) && $model->medicalHistory->allergies == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </span>
                </div>
            </td>
            <td style="width: 33.33%; padding-right: 10px">
                <div class="list-items">
                    <span class="position-left">
                        {{__('general.physical_disabilities')}}
                    </span>
                    <span class="position-right">
                      {!! (isset($model->medicalHistory->physical_disabilities) && $model->medicalHistory->physical_disabilities == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </span>
                </div>
            </td>
            <td style="width: 33.33%; padding-right: 10px">
                <div class="list-items">
                    <span class="position-left">
                        {{__('general.physical_disabilities')}}
                    </span>
                    <span class="position-right">
                        {!! (isset($model->medicalHistory->dietary_restrictions) && $model->medicalHistory->dietary_restrictions == 1) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">{{__('general.past_existing_illness')}}:</td>
        </tr>
        <tr>
            @php
                $count_loop = 0;
            @endphp
            @foreach(\App\Services\GeneralService::getMedicalHistry() as $key => $value)
                @php
                    $count_loop++;
                    $past_existing_illness = (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness',$key)->where('fdw_bio_data_id',$model->id)->count() > 0) ? true : false;

                @endphp
                <td style="width: 33.33%; padding-right: 10px">
                    <div class="list-items">
                    <span class="position-left">
                        {{$value}}
                    </span>
                        <span class="position-right">
                        {!! ($past_existing_illness === true) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </span>
                    </div>
                </td>
                @if($count_loop == 3)
                    </tr><tr>
                @php
                 $count_loop = 0;
                @endphp
               @endif
            @endforeach
        </tr>
        <tr>
            <td style="width: 33.33%; padding-right: 10px; padding-top: 40px">
                <div class="list-items">
                    <span class="position-left">
                       {{__('general.food_handling_preferences')}}
                    </span>
                    <span class="position-right">
                        {!! isset($model->medicalHistory->food_handling_preferences) ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}
                    </span>
                </div>
            </td>
        </tr>
    </table>
</div>
<footer>
    <div class="page-number"></div>
</footer>
