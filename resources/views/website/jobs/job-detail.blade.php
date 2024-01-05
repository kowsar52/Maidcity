 <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('general.job_detail') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                    <th>{{ __('general.job_id') }}</th>
                    <td>{{ $job->id }}</td>
                </tr>
                <tr>
                    <th>{{ __('general.job_title') }}</th>
                    <td>{{ $job->job_title }}</td>
                </tr>
                <tr>
                    <th>{{ __('general.job_description') }}</th>
                    <td>{!! strip_tags($job->job_description) !!}</td>
                </tr>
                <tr>
                    <th>{{ __('general.salary_range') }}</th>
                    <td>${{ $job->salary_range }}</td>
                </tr>
                <tr>
                    <th>{{ __('general.start_date') }}</th>
                    <td>{{ isset($job->expected_start_date) ? \App\Services\GeneralService::dateFormat($job->expected_start_date) : 'N/A' }}</td>
                </tr>
                <tr>
                    <th>{{ __('general.type_of_mdw') }}</th>
                    <td>
                        @isset($job->type_of_mdw)
                            @foreach($job->type_of_mdw as $type_of_mdw)
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
                        @isset($job->nationality_preferred)
                            @foreach($job->nationality_preferred as $nationality_preferred)
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
                    <td>{{ isset($job->rest_day) ? \App\Services\GeneralService::getPreferenceForRestDay($job->rest_day) : 'N/A' }}</td>
                </tr>
                <tr>
                    <th>{{ __('general.employer_requirement') }}</th>
                    <td>
                        @isset($job->employer_requirement)
                            @foreach($job->employer_requirement as $employer_requirement)
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
                    <td>{{ $job->createdBy->name }}</td>
                </tr>
            </table>
            <div class="row g-3">
                <div class="col-auto">
                    <a class="btn-custom btn-custom-primary job-action" href="javascript:void(0)"
                       id="applyNow{{ $job->id }}"
                       data-url="{{ route('website.job-apply.create',['job_id' => $job->id]) }}">{{ __('general.apply_now') }}</a>
                </div>
                <div class="col-auto">
                    <a href="javascript:void(0)" class="btn-custom btn-custom-light shadow-sm" id="shareSocialMedia" data-url="{{ route('website.job-share-social-media',$job->id) }}">
                        <i class="fas fa-share-alt me-3"></i>
                        {{ __('general.share') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
