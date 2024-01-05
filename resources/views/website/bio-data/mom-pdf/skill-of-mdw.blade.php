<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>(B)</b></span>
        </td>
        <td>
            <span
                style="font-size:15px; text-decoration: underline; text-transform: uppercase;"><b>{{ __('general.skills_of_fdw') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>B1</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.method_of_evaluation_of_skills') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 5px;">
    <tbody>
    <tr>
        <td style="width: 15%;">
            <span>{{ __('general.please_indicate_the_method_used') }}:</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0 19" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="width: 99%;">
            <input type="checkbox"
                   {{ (isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','based_on_fdw')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.based_on_fdw') }}</span>
        </td>
    </tr>
    </tbody>
</table>
@if(isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','based_on_fdw')->count() > 0)
    @include('website.bio-data.mom-pdf.components.skill-evaluation-table')
@endif
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 19px;">
            <input type="checkbox"
                   {{ (isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','interview_by_singapore')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.interview_by_singapore') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_singapore_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_singapore_via','teleconference')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.teleconference_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_singapore_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_singapore_via','videoconference')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.videoconference_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_singapore_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_singapore_via','person')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.person_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_singapore_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_singapore_via','observed_work')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.observed_work_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
@if(isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','interview_by_singapore')->count() > 0)
    @include('website.bio-data.mom-pdf.components.skill-evaluation-table')
@endif
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 7px;">
    <tbody>
    <tr>
        <td style="width: 85%; padding-left: 19px;">
            <input type="checkbox"
                   {{ (isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','interview_by_overseas_training_centre')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span style="text-decoration: underline;">{{ __('general.interview_by_overseas_training_centre') }}</span>
            <span>({{ __('general.name_of_foreign_training_centre') }} :</span>
        </td>
        <td style="width: 14%;">
            <div style="border-bottom: 1px solid;">
                {{ isset($model->name_of_foreign_training_centre) ? $model->name_of_foreign_training_centre : '' }}
            </div>
        </td>
        <td style="width: 1%;">
            )
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="width: 75%; padding-left: 39px;">
            <span>{{ __('general.if_third_party_is_certified') }}:</span>
        </td>
        <td style="width: 25%;">
            <div style="border-bottom: 1px solid;">
                {{ isset($model->name_of_third_party_training_centre) ? $model->name_of_third_party_training_centre : '' }}
            </div>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_overseas_training_centre_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_overseas_training_centre_via','teleconference')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.teleconference_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_overseas_training_centre_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_overseas_training_centre_via','videoconference')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.videoconference_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 3px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_overseas_training_centre_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_overseas_training_centre_via','person')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.person_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table" style="margin-bottom: 9px;">
    <tbody>
    <tr>
        <td style="padding-left: 39px;">
            <input type="checkbox"
                   {{ (isset($model->interview_by_overseas_training_centre_via) && $model->where('id',$model->id)->whereJsonContains('interview_by_overseas_training_centre_via','observed_work')->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
            <span>{{ __('general.observed_work_interview') }}</span>
        </td>
    </tr>
    </tbody>
</table>
@if(isset($model->method_of_evaluation_of_skills) && $model->where('id',$model->id)->where('method_of_evaluation_of_skills','interview_by_overseas_training_centre')->count() > 0)
    @include('website.bio-data.mom-pdf.components.skill-evaluation-table')
@endif
<footer>
    <div class="page-number"></div>
</footer>
