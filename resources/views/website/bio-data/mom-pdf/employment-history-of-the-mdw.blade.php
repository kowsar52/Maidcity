@include('website.bio-data.mom-pdf.components.header')
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>(C)</b></span>
        </td>
        <td>
            <span style="font-size:15px; text-decoration: underline; text-transform: uppercase;"><b>{{ __('general.employment_history_of_the_fdw') }}</b></span>
        </td>
    </tr>

    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>C1</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.employment_history_overseas') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table border="1" cellpadding="15" cellspacing="0" class="table" style="">
    <thead style="background-color: lightgray;">
        <tr>
            <th colspan="2" style="width: 20%;">{{ __('general.date') }}</th>
            <th rowspan="2" style="width: 15%;">{{ __('general.including_country') }}</th>
            <th rowspan="2" style="width: 15%;">{{ __('general.employer') }}</th>
            <th rowspan="2" style="width: 35%;">{{ __('general.work_duties') }}</th>
            <th rowspan="2" style="width: 15%;">{{ __('general.remarks') }}</th>
        </tr>
        <tr>
            <th>{{ __('general.from') }}</th>
            <th>{{ __('general.to') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;">
                <span>{{ __('general.please_refer_to_page') }}</span>
            </td>
            <td style="padding: 35px;"></td>
        </tr>
        <tr>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;"></td>
            <td style="padding: 35px;">
                <span>{{ __('general.please_refer_to_page') }}</span>
            </td>
            <td style="padding: 35px;"></td>
        </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>C2</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.employment_history_in_singapore') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 0;">
    <tbody>
    <tr>
        <td style="width: 60%">
            <span>{{ __('general.previous_working_experience_in_singapore') }}</span>
        </td>
        <td style="width: 20%">
            <input type="checkbox"
                   {{ (isset($model->bioDataDetail->previous_working_experience_in_singapore) && $model->bioDataDetail->previous_working_experience_in_singapore == 1) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.yes') }}</span>
        </td>
        <td style="width: 20%">
            <input type="checkbox"
                   {{ (isset($model->bioDataDetail->previous_working_experience_in_singapore) && $model->bioDataDetail->previous_working_experience_in_singapore == 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.no') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td>
            <span>{{ __('general.employment_history_in_singapore_description') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>C3</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.feedback_from_previous_employers_in_singapore') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span>
                {{ __('general.feedback_from_previous_employers_in_singapore_description') }}:
            </span>
        </td>
    </tr>
    </tbody>
</table>
<table border="1" cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 19px;">
    <thead>
        <tr>
            <th style="width: 15%;"></th>
            <th>{{ __('general.feedback') }}</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td style="padding: 15px;"><b>{{ __('general.employer') }}1</b></td>
        <td style="padding: 15px;">{{ $model->bioDataDetail->prev_employer_one_feedback ?? '' }}</td>
    </tr>
    <tr>
        <td style="padding: 15px;"><b>{{ __('general.employer') }}2</b></td>
        <td style="padding: 15px;">{{ $model->bioDataDetail->prev_employer_two_feedback ?? '' }}</td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="page-number"></div>
</footer>
