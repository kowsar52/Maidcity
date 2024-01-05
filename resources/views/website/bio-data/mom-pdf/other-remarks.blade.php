<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 35px;">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>(E)</b></span>
        </td>
        <td>
            <span style="font-size:15px; text-decoration: underline; text-transform: uppercase;"><b>{{ __('general.other_remarks') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 25px;">
    <tbody>
    <tr>
        <td>
            <div style="border-bottom: 1px solid;">
                {{ isset($model->bioDataDetail->fdw_other_details) ? Str::substr($model->bioDataDetail->fdw_other_details,0,203) : ''  }}
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 75px;">
    <tbody>
    <tr>
        <td>
            <div style="border-bottom: 1px solid;">
                {{ isset($model->bioDataDetail->fdw_other_details) ? Str::substr($model->bioDataDetail->fdw_other_details,203) : '' }}
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 35px;">
    <tbody>
    <tr>
        <td style="width: 40%;">
            <div style="border-bottom: 1px solid;">
                {{ $model->bioDataDetail->fdw_name_signature ?? '' }}
            </div>
            <div style="margin-bottom: 3px;">{{ __('general.fdw_name_signature') }}</div>
            <span>{{ __('general.date').': '.\Carbon\Carbon::parse($model->bioDataDetail->fdw_date)->format('Y-m-d') }}</span>
        </td>
        <td style="width: 20%;"></td>
        <td style="width: 40%;">
            <div style="border-bottom: 1px solid;">
                {{ $model->bioDataDetail->personnel_name_reg_no ?? '' }}
            </div>
            <div style="margin-bottom: 3px;">{{ __('general.personnel_name_reg_no') }}</div>
            <span>{{ __('general.date').': '.\Carbon\Carbon::parse($model->bioDataDetail->ea_personnel_date)->format('Y-m-d') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 39px;">
    <tbody>
    <tr>
        <td>
            <span>{{ __('general.i_have_gone_through') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 35px;">
    <tbody>
    <tr>
        <td style="width: 40%;">
            <div style="border-bottom: 1px solid;">
                {{ $model->bioDataDetail->employer_nric_no ?? '' }}
            </div>
            <div style="margin-bottom: 3px;">{{ __('general.employer_nric_no') }}</div>
            <span>{{ __('general.date').': '.\Carbon\Carbon::parse($model->bioDataDetail->employer_date)->format('Y-m-d') }}</span>
        </td>
        <td style="width: 20%;"></td>
        <td style="width: 40%;"></td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 35px;">
    <tbody>
    <tr>
        <td style="text-align: center;">
            <span style="font-size: 19px;">***************</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
    <tbody>
    <tr>
        <td>
            <span style="text-decoration: underline;"><b>{{ __('general.imp_note_or_employers') }}</b></span>
            <ul style="margin: 3px 35px; padding: 0;">
                <li style="padding: 0 15px; list-style: square;">{{ __('general.important_notes_one') }}</li>
                <li style="padding: 0 15px; list-style: square;">{{ __('general.important_notes_two') }}</li>
                <li style="padding: 0 15px; list-style: square;">{{ __('general.important_notes_three') }}</li>
                <li style="padding: 0 15px; list-style: square;">{{ __('general.important_notes_four') }}</li>
            </ul>
        </td>
    </tr>
    </tbody>
</table>
<div class="page-break"></div>
<footer>
    <div class="page-number"></div>
</footer>
