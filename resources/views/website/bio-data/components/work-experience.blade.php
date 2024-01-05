<div class="mt-4 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.work_experience')}}</h4>
    @foreach($model->workExperienceWithEmployers as $data)
        <h5>{{ __('general.employer').' '.$loop->iteration }}</h5>
        <div class="bioex-row @if(!$loop->last) mb-3 @endif">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.name_of_employer')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->name_of_employer ?? 'N/A'}}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{(isset($data->present) && $data->present == 1) ? __('general.from_date') : __('general.date_from_to')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">
                                @if(isset($data->present) && $data->present == 1)
                                    {{ isset($data->from_date) ? \Carbon\Carbon::parse($data->from_date)->format('d M Y') : 'N/A'  }}
                                @else
                                    {{ isset($data->from_date) ? \Carbon\Carbon::parse($data->from_date)->format('d M Y') : 'N/A'  }} - {{ isset($data->to_date) ? \Carbon\Carbon::parse($data->to_date)->format('d M Y') : 'N/A'  }}
                                @endif
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.country_of_work')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ isset($data->country_id) ? \App\Services\GeneralService::countryForDropdown($data->country_id) : 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.nationality_race')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->nationality ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.language_used')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->language ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.type_of_house')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->type_of_house ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.members_in_family')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->members_in_family ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.starting_last_salary')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">${{ $data->salary ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">{{__('general.age_of_children_elderly')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->age_of_children ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="w-50">Off Day's Given:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->off_days_given ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="wid_pix">{{__('general.duties_detail')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->duties_detail ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item list-items d-flex justify-between align-content-center">
                            <span class="wid_pix">{{__('general.reason_for_leaving')}}:</span>
                            <span class="badge text-dark rounded-pill fs-7 fw-normal">{{ $data->reason_for_leaving ?? 'N/A'  }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
