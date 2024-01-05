@extends('layouts.website')
@section('meta-tag')
    <meta property="og:title"         content="{{ $model->job_title ?? '' }}"/>
    <meta property="og:description"   content="{{ $model->job_description ?? '' }}"/>
    <meta property="og:image"         content="{{ asset('assets/website/img/images/avatar.png') }}"/>
@endsection
@section('css-after')
@endsection
@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-12">
                    <table class="table align-middle">
                        <tr>
                            <td><img src="{{ asset('assets/website/img/images/avatar.png') }}" alt="Profile" style="width: auto; height: 75px;"></td>
                            <td>
                                <div style="width: 93px; height: auto; font-size: 9px; font-weight: 900; text-align: center; float: right;">
                                    <img src="{{ asset('assets/website/img/logo/logo.png') }}" alt="Logo">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('general.job_title') }}</th>
                            <td>{{ $model->job_title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('general.job_description') }}</th>
                            <td>{!! strip_tags($model->job_description) !!}</td>
                        </tr>
                        <tr>
                            <th>{{ __('general.salary_range') }}</th>
                            <td>${{ $model->salary_range }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('general.start_date') }}</th>
                            <td>{{ isset($model->expected_start_date) ? \App\Services\GeneralService::dateFormat($model->expected_start_date) : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('general.type_of_mdw') }}</th>
                            <td>
                                @isset($model->type_of_mdw)
                                    @foreach($model->type_of_mdw as $type_of_mdw)
                                        {{ \App\Services\JobService::typeOfMDW($type_of_mdw) }}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('general.nationality_preferred') }}</th>
                            <td>
                                @isset($model->nationality_preferred)
                                    @foreach($model->nationality_preferred as $nationality_preferred)
                                        {{ \App\Services\JobService::nationalityPreferred($nationality_preferred) }}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('general.rest_day') }}</th>
                            <td>{{ isset($model->rest_day) ? \App\Services\GeneralService::getPreferenceForRestDay($model->rest_day) : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('general.employer_requirement') }}</th>
                            <td>
                                @isset($model->employer_requirement)
                                    @foreach($model->employer_requirement as $employer_requirement)
                                        {{ \App\Services\GeneralService::categoryForDropdown($employer_requirement) }}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('general.post_by') }}</th>
                            <td>{{ $model->createdBy->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
