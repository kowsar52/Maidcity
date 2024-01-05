@include('website.bio-data.mom-pdf.components.header')
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>A3</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.others') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 23%;">
            <span>19. {{ __('general.preference_for_rest_day') }}:</span>
        </td>
        <td style="width: 21%;">
            <div style="border-bottom: 1px solid;">
                {{ isset($model->bioDataDetail->preference_for_rest_day) ? \App\Services\GeneralService::getPreferenceForRestDay($model->bioDataDetail->preference_for_rest_day) : '' }}
            </div>
        </td>
        <td style="width: 56%;">
            rest day(s) per month.
        </td>
    </tr>
    </tbody>
</table>
<!--<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 29%;">
            <span>20. {{ __('general.remarks_for_agent_only') }}:</span>
        </td>
        <td style="width: 81%;">
            <div style="border-bottom: 1px solid;">
                {{ $model->bioDataDetail->any_other_remarks ?? '' }}
            </div>
        </td>
    </tr>
    </tbody>
</table>-->
<footer>
    <div class="page-number"></div>
</footer>
