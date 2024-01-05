<table class="w-100" style="margin-top: 25px">
    <tr>
        <th class="w-90 blue_color" style="font-size: 1rem">{{__('general.ref_no')}} {{$model->id ?? 'N/A'}}</th>
        <td class="text-right"><img src="{{isset($model->nationality) ? \App\Services\GeneralService::class::getCountryImage($model->nationality) : asset('assets/website/img/flag/other.png')}}" alt="" class="w-100" style="border: 1px solid rgb(128,128,128) !important;"></td>
    </tr>
</table>
