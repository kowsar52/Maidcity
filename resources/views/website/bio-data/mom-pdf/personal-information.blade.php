<table cellpadding="7px 0" cellspacing="0" class="table" style="margin: 9px 0 5px 0;">
    <tbody>
    <tr>
        <td style="width: 9%; margin-bottom: 15px;">
            <span style="font-size: 15px;"><b>(A)</b></span>
        </td>
        <td>
            <span style="font-size:15px; text-decoration: underline; text-transform: uppercase;"><b>{{ __('general.profile_of_fdw') }}</b></span>
        </td>
    </tr>
    <tr>
        <td style="width: 9%">
            <span style="font-size: 15px;"><b>A1</b></span>
        </td>
        <td>
            <span style="font-size: 15px;"><b>{{ __('general.personal_information') }}</b></span>
        </td>
    </tr>
    </tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table">
    <tbody>
    <tr>
        <td style="width: 65%;">
            <table class="table">
                <tbody>
                <tr>
                    <td style="width: 15%;">
                        <span>1. {{ __('general.name') }}:</span>
                    </td>
                    <td style="width: 85%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->name }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width:61%;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody>
                            <tr>
                                <td style="width: 35%;">
                                    <span>2. {{ __('general.date_of_birth') }}:</span>
                                </td>
                                <td style="width: 65%;">
                                    @php
                                        $date_of_birth = \Carbon\Carbon::parse($model->date_of_birth)->format('dmy');
                                        $array_map_date_of_birth = array_map('intval', str_split($date_of_birth));
                                    @endphp
                                    @foreach($array_map_date_of_birth as $dob)
                                        <div class="border-text"
                                             style="@if($loop->iteration == 2 || $loop->iteration == 4 || $loop->iteration == 6) margin: 0 9px 0 3px; @endif">
                                            {{ $dob }}
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 39%;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tbody>
                            <tr>
                                <td style="width: 17%;">
                                    <span>{{ __('general.age') }}:</span>
                                </td>
                                <td style="width: 83%;">
                                    @php
                                        $array_map_age = array_map('intval', str_split($model->age));
                                    @endphp
                                    @foreach($array_map_age as $age)
                                        <div class="border-text"
                                             style="@if($loop->iteration == 2) margin: 0 9px 0 3px; @endif">
                                            {{ $age }}
                                        </div>
                                    @endforeach
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
                    <td style="width: 23%;">
                        <span>3. {{ __('general.place_of_birth') }}:</span>
                    </td>
                    <td style="width: 77%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->place_of_birth }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 61%;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%; ">
                            <tbody>
                            <tr>
                                <td style="width: 43%;">
                                    <span>4. {{ __('general.height_weight') }}:</span>
                                </td>
                                <td style="width: 57%;">
                                    @php
                                        $array_map_height = array_map('intval', str_split($model->height));
                                    @endphp
                                    @foreach($array_map_height as $height)
                                        <div class="border-text" style="margin: 0 1px 0 3px;">
                                            {{ $height }}
                                        </div>
                                        @if($loop->last)
                                            <span style="font-size: 13px; margin-left: 1px;">
                                                    cm
                                                </span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 39%;">
                        @php
                            $array_map_weight = array_map('intval', str_split($model->weight));
                        @endphp
                        @foreach($array_map_weight as $weight)
                            <div class="border-text" style="margin: 0 1px 0 3px;">
                                {{ $weight }}
                            </div>
                            @if($loop->last)
                                <span style="font-size: 13px; margin-left: 1px;">
                                    kg
                                </span>
                            @endif
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 19%;">
                        <span>5. {{ __('general.nationality') }}:</span>
                    </td>
                    <td style="width: 81%;">
                        <div style="border-bottom: 1px solid;">
                            {{ isset($model->nationality) ? \App\Services\GeneralService::nationalityForDropdown($model->nationality) : '' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 53%;">
                        <span>6. {{ __('general.residential_address_in_home_country') }}:</span>
                    </td>
                    <td style="width: 47%;">
                        <div style="border-bottom: 1px solid;">
                            {{ Str::substr($model->residential_address_in_home_country,0,31) }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td>
                        <div style="border-bottom: 1px solid;">
                            {{ Str::substr($model->residential_address_in_home_country,31) }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 59%;">
                        <span>7. {{ __('general.name_of_airport') }}:</span>
                    </td>
                    <td style="width: 41%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->name_of_airport }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 49%;">
                        <span>8. {{ __('general.home_country_contact') }}:</span>
                    </td>
                    <td style="width: 51%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->contact_no_in_home_country }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 15%;">
                        <span>9. {{ __('general.religion') }}:</span>
                    </td>
                    <td style="width: 85%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->contact_no_in_home_country }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 29%;">
                        <span>10. {{ __('general.education_level') }}:</span>
                    </td>
                    <td style="width: 71%;">
                        <div style="border-bottom: 1px solid;">
                            {{ isset($model->education_level) ? \App\Services\GeneralService::getEducation($model->education_level) : '' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 33%;">
                        <span>11. {{ __('general.number_of_siblings') }}:</span>
                    </td>
                    <td style="width: 67%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->number_of_siblings }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 25%;">
                        <span>12. {{ __('general.marital_status') }}:</span>
                    </td>
                    <td style="width: 75%;">
                        <div style="border-bottom: 1px solid;">
                            {{ isset($model->marital_status) ? \App\Services\GeneralService::maritalStatusForDropdown($model->marital_status) : '' }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 33%;">
                        <span>13. {{ __('general.number_of_children') }}:</span>
                    </td>
                    <td style="width: 67%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->no_of_children }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                <tr>
                    <td style="width: 37%;">
                        <span>- {{ __('general.ages_of_children_if_any') }}:</span>
                    </td>
                    <td style="width: 63%;">
                        <div style="border-bottom: 1px solid;">
                            {{ $model->age_of_children }}
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
        <td style="width: 35%;">
            <table cellpadding="0" cellspacing="9" class="table">
                <tbody>
                <tr>
                    <td>
                        <img src="{{ isset($model->photo) ? asset('storage/'.$model->photo) : asset('assets/website/img/images/avatar.png') }}" class="profile-picture" alt="Profile Picture">
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
