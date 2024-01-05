
<div class="row g-3 mt-5" style="{{ request()->query('type') === 'mdw' || request()->query('type') === 'caregiver' ? 'display: block;' : 'display: none;' }}">
    <div class="col-12">
        <div class="bg-custom-primary p-3">
            <h3 class="text-white mb-0">{{ request()->query('type') === 'mdw' ? __('general.migrant_domestic_worker') : __('general.caregiver') }}</h3>
        </div>
    </div>
    @forelse($data as $d)
        <div class="col-12">
            <!-- Card Start -->
            <div class="card rounded-3 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-md-8">
                            <div class="d-flex gap-3">
                                <img class="border rounded"
                                     src="{{ asset('assets/website/img/images/avatar.png') }}" alt=""
                                     style="width: 80px; height: 80px;">
                                <div class="row g-1">
                                    <h5 class="text-dark mb-1">
                                        {{ $d->job_title }}
                                    </h5>
                                    <div class="col-md-4">
                                        <small class="text-dark me-3">
                                            {{ __('general.post_by') }}:
                                            <span class="text-secondary fst-italic">
                                            {{ $d->createdBy->name }}
                                        </span>
                                        </small>
                                    </div>
                                    @isset($d->expected_start_date)
                                        <div class="col-md-4">
                                            <small class="text-dark me-3">
                                                {{ __('general.start_date') }}:
                                                <span class="text-secondary fst-italic">
                                                {{ \App\Services\GeneralService::dateFormat($d->expected_start_date) }}
                                            </span>
                                            </small>
                                        </div>
                                    @endisset
                                    <div class="col-md-4">
                                        <small class="text-dark me-3">
                                            {{ __('general.job_id') }}:
                                            <span class="text-secondary fst-italic">
                                            {{ $d->id }}
                                        </span>
                                        </small>
                                    </div>
                                    <div class="col-12"></div>
                                    @isset($d->nationality_preferred)
                                        <div class="col-md-4">
                                            <span class="text-truncate text-secondary me-3">
                                            <i class="fa fa-map-marker-alt text-success me-2"></i>
                                                @foreach($d->nationality_preferred as $nationality_preferred)
                                                    {{ \App\Services\JobService::nationalityPreferred($nationality_preferred) }}
                                                    @if(!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                        </span>
                                        </div>
                                    @endisset
                                    @isset($d->rest_day)
                                        <div class="col-md-4">
                                            <span class="text-truncate text-secondary me-3"><i
                                                    class="far fa-clock text-success me-2"></i>{{ \App\Services\GeneralService::getPreferenceForRestDay($d->rest_day) }}</span>
                                        </div>
                                    @endisset
                                    @isset($d->salary_range)
                                        <div class="col-md-4">
                                            <span class="text-truncate text-secondary me-0"><i
                                                    class="far fa-money-bill-alt text-success me-2"></i>${{ $d->salary_range }}</span>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-end gap-3">
                                <a class="btn-custom btn-custom-primary job-action" href="javascript:void(0)"
                                   id="applyNow{{ $d->id }}"
                                   data-url="{{ route('website.job-apply.create',['job_id' => $d->id]) }}">{{ __('general.apply_now') }}</a>
                                <a class="btn-custom btn-custom-secondary job-action"
                                   href="javascript:void(0)" id="jobDetail{{ $d->id }}" data-url="{{ route('website.job-detail',$d->id) }}">{{ __('general.view_detail') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card End -->
        </div>
    @empty
        <div class="text-center">
            <h5 class="text-dark">{{ __('general.no_job_available') }}</h5>
        </div>
    @endforelse
</div>
