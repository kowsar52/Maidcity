@include('website.bio-data.mom-pdf.components.header')
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>(D)</b></span>
        </td>
        <td>
            <span style="font-size:15px; text-decoration: underline; text-transform: uppercase;"><b>{{ __('general.availability_of_fdw_to_be_interview') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
    <tbody>
    <tr>
        <td style="width: 9%;">
            <input type="checkbox"
                {{ (isset($model->bioDataDetail->availability_of_fdw_for_interview) && $model->bioDataDetail->where('id',$model->id)->whereJsonContains('availability_of_fdw_for_interview','fdw_is_not_available')->count() > 0) ? 'checked' : '' }}>
        </td>
        <td style="width: 91%;">
            <span>MDW is not available for interview</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
    <tbody>
    <tr>
        <td style="width: 9%;">
            <input type="checkbox"
                {{ (isset($model->bioDataDetail->availability_of_fdw_for_interview) && $model->bioDataDetail->where('id',$model->id)->whereJsonContains('availability_of_fdw_for_interview','fdw_interviewed_by_phone')->count() > 0) ? 'checked' : '' }}>
        </td>
        <td style="width: 91%;">
            <span>MDW can be interviewed by phone</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
    <tbody>
    <tr>
        <td style="width: 9%;">
            <input type="checkbox"
                {{ (isset($model->bioDataDetail->availability_of_fdw_for_interview) && $model->bioDataDetail->where('id',$model->id)->whereJsonContains('availability_of_fdw_for_interview','fdw_interviewed_by_video')->count() > 0) ? 'checked' : '' }}>
        </td>
        <td style="width: 91%;">
            <span>MDW can be interviewed by video-conference</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 19px;">
    <tbody>
    <tr>
        <td style="width: 9%;">
            <input type="checkbox"
                {{ (isset($model->bioDataDetail->availability_of_fdw_for_interview) && $model->bioDataDetail->where('id',$model->id)->whereJsonContains('availability_of_fdw_for_interview','fdw_interviewed_by_person')->count() > 0) ? 'checked' : '' }}>
        </td>
        <td style="width: 91%;">
            <span>MDW can be interviewed in person</span>
        </td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="page-number"></div>
</footer>
