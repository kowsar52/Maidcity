<div class="mt-4">
    <h4 class="card-heading">{{__('general.preference_of_work')}}</h4>
    <table class="w-100" style=" border: 1px solid; border-collapse: collapse">
        <thead class="table-primary-dark text-white">
        <tr>
            <th class="w-75 table-heading-color" >{{__('general.duty')}}</th>
            <th class="table-heading-color">{{__('general.rating')}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border: 1px solid;">{{__('general.care_of_babies')}}</td>
            <td style="border: 1px solid;">{!! isset($model->bioDataDetail->care_of_babies) ? \App\Services\GeneralService::fiveStar($model->bioDataDetail->care_of_babies) : 'N/A'  !!}</td>
        </tr>
        <tr>
            <td style="border: 1px solid;">{{__('general.care_of_children')}}</td>
            <td>{!! isset($model->bioDataDetail->care_of_children) ? \App\Services\GeneralService::fiveStar($model->bioDataDetail->care_of_children) : 'N/A'  !!}</td>
        </tr>
        <tr>
            <td style="border: 1px solid;">{{__('general.cooking')}}</td>
            <td style="border: 1px solid;">{!! isset($model->bioDataDetail->cooking) ? \App\Services\GeneralService::fiveStar($model->bioDataDetail->cooking) : 'N/A'  !!}</td>
        </tr>
        <tr>
            <td style="border: 1px solid;">{{__('general.routine_house_work')}}</td>
            <td style="border: 1px solid;">{!! isset($model->bioDataDetail->routine_house_work) ? \App\Services\GeneralService::fiveStar($model->bioDataDetail->routine_house_work) : 'N/A'  !!}</td>
        </tr>
        <tr>
            <td style="border: 1px solid;">{{__('general.care_of_special_child')}}</td>
            <td style="border: 1px solid;">{!! isset($model->bioDataDetail->routine_house_work) ? \App\Services\GeneralService::fiveStar($model->bioDataDetail->routine_house_work) : 'N/A'  !!}</td>
        </tr>
        </tbody>
    </table>
</div>
