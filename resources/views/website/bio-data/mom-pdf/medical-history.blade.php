<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>A2</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.medical_history') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 100%;">
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 19%;">
                        <span>14. {{ __('general.allergies_if_any') }}:</span>
                    </td>
                    <td style="width: 81%;">
                        <div style="border-bottom: 1px solid;">
                            {{ ($model->medicalHistory->allergies == 1) ? 'Yes '.(($model->medicalHistory->allergies_detail !== null) ? '('.$model->medicalHistory->allergies_detail.')' : '') : 'No' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td colspan="2" style="width: 100%;">
                        <span>15. {{ __('general.past_existing_illness') }}:</span>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <table cellpadding="0" cellspacing="9" style="width: 100%;">
                            <tbody>
                            <tr style="line-height: 0;">
                                <td style="width: 1%;"></td>
                                <td style="width: 49%;"></td>
                                <td style="width: 25%;">Yes</td>
                                <td style="width: 25%;">No</td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    i.
                                </td>
                                <td>
                                    <span> {{ __('general.mental_illness') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','mental_illness')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','mental_illness')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    ii.
                                </td>
                                <td>
                                    <span>{{ __('general.epilepsy') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','epilepsy')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','epilepsy')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    iii.
                                </td>
                                <td>
                                    <span>{{ __('general.asthma') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','asthma')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','asthma')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    iv.
                                </td>
                                <td>
                                    <span>{{ __('general.diabetes') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','diabetes')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','diabetes')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    v.
                                </td>
                                <td>
                                    <span>{{ __('general.hypertension') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','hypertension')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','hypertension')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 50%;">
                        <table cellpadding="0" cellspacing="9" style="width: 100%;">
                            <tbody>
                            <tr style="line-height: 0;">
                                <td style="width: 1%;"></td>
                                <td style="width: 49%;"></td>
                                <td style="width: 25%;">Yes</td>
                                <td style="width: 25%;">No</td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    vi.
                                </td>
                                <td>
                                    <span>{{ __('general.tuberculosis') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','tuberculosis')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','tuberculosis')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    vii.
                                </td>
                                <td>
                                    <span>{{ __('general.heart_disease') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','heart_disease')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','heart_disease')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    viii.
                                </td>
                                <td>
                                    <span>{{ __('general.malaria') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','malaria')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','malaria')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    ix.
                                </td>
                                <td>
                                    <span>{{ __('general.operations') }}</span>
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','operations')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','operations')->where('fdw_bio_data_id',$model->id)->count() == 0) ? 'checked' : '' }} style="line-height: 11px;">
                                </td>
                            </tr>
                            <tr style="line-height: 0;">
                                <td>
                                    x.
                                </td>
                                <td colspan="3">
                                    <table cellpadding="0" cellspacing="0" style="width: 100%; margin-top: 9px;">
                                        <tbody>
                                        <tr>
                                            <td style="width: 15%;">
                                                <span>{{ __('general.others') }}:</span>
                                            </td>
                                            <td style="width: 85%;">
                                                <div style="border-bottom: 1px solid;">
                                                    {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('past_existing_illness','other')->where('fdw_bio_data_id',$model->id)->count() > 0) ? $model->medicalHistory->other_illness_detail : '' }}
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 21%;">
                        <span>16. {{ __('general.physical_disabilities') }}:</span>
                    </td>
                    <td style="width: 79%;">
                        <div style="border-bottom: 1px solid;">
                            {{ ($model->medicalHistory->physical_disabilities == 1) ? 'Yes '.(($model->medicalHistory->physical_disabilities_detail !== null) ? '('.$model->medicalHistory->physical_disabilities_detail.')' : '') : 'No' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 21%;">
                        <span>17. {{ __('general.dietary_restrictions') }}:</span>
                    </td>
                    <td style="width: 79%;">
                        <div style="border-bottom: 1px solid;">
                            {{ ($model->medicalHistory->dietary_restrictions == 1) ? 'Yes '.(($model->medicalHistory->dietary_restrictions_detail !== null) ? '('.$model->medicalHistory->dietary_restrictions_detail.')' : '') : 'No' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 45%;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody>
                            <tr>
                                <td style="width: 61%;">
                                    <span>18. {{ __('general.food_handling_preferences') }}:</span>
                                </td>
                                <td style="width: 39%;">
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('food_handling_preferences','no_pork')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
                                    {{ __('general.no_pork') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 20%;">
                        <input type="checkbox"
                               {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('food_handling_preferences','no_beef')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
                        {{ __('general.no_beef') }}
                    </td>
                    <td style="width: 35%;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody>
                            <tr>
                                <td style="width: 27%;">
                                    <input type="checkbox"
                                           {{ (isset($model->medicalHistory->past_existing_illness) && $model->medicalHistory->whereJsonContains('food_handling_preferences','other')->where('fdw_bio_data_id',$model->id)->count() > 0) ? 'checked' : '' }} style="line-height: 0;">
                                    {{ __('general.others') }}:
                                </td>
                                <td style="width: 73%;">
                                    <div style="border-bottom: 1px solid;">
                                        {{ (isset($model->medicalHistory->other_food_handling_preferences) && $model->medicalHistory->whereJsonContains('food_handling_preferences','other')->where('fdw_bio_data_id',$model->id)->count() > 0) ? $model->medicalHistory->other_food_handling_preferences : '' }}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="page-number"></div>
</footer>
