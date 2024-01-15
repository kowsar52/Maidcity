@php
    $recommended_mdws = \App\Services\FdwBioDataService::getRecommendedMdws();
@endphp

{{-- <!-- project-area -->
<section class="pt-80 pb-30">
    <div class="container custom-container">
        <div class="row justify-content-center">
            @if(isset($heading) && count($recommended_mdws) > 0)
                <div class="bg-custom-primary p-3 mb-3">
                    <h3 class="text-white mb-0">{{ __('general.recommended_mdw') }}</h3>
                </div>
            @endif
            @foreach($recommended_mdws as $d)
                <div class="col-lg-2 col-md-3">
                    <div class="blog-post-item-two">
                        <div class="blog-post-thumb-two">
                            <a href="{{ route('website.bio-data.show',$d->id) }}">
                                <img src="{{ \App\Services\GeneralService::getBioDataImage($d->photo) }}" alt="">
                            </a>
                            <ul class="nationality-list m-0 @guest filter @endguest">
                                @foreach($d->bio_data_type as $bio)
                                    <li>
                                        <a href="javascript:void(0)" onclick="DataTypeModal({{$d->id}});">
                                            {{ isset($bio) ? \App\Services\GeneralService::bioDataTypeForDropdown($bio) : 'N/A' }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="flag_div @guest filter @endguest">
                                <img
                                    src="{{ isset($d->nationality) ? \App\Services\GeneralService::getCountryImage($d->nationality) : asset('assets/website/img/flag/other.png') }}"
                                    alt="" class="flag">
                            </div>
                        </div>
                        <div class="blog-post-content-two @guest filter @endguest">
                            <div>
                                @foreach($d->overseasEmploymentHistories  as $record)
                                    @if(isset($record->country_id))
                                        <span class="bg-warning p-1 fs-8 text-dark rounded-2">{{ 'EX-'.\App\Services\GeneralService::getCountries($record->country_id)}}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-2">
                                @foreach($d->languageAbilities as $language)
                                    @if(isset($language->language_id))
                                        <span class="bg-primary p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::languageForDropdown($language->language_id) ?? 'N/A'}}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-2 d-flex flex-wrap gap-1">
                                @isset($d->bioDataDetail->recommended_helper)
                                    @foreach($d->bioDataDetail->recommended_helper as $data)
                                        <span class="bg-danger p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::categoryForDropdown($data)}}</span>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- project-area-end --> --}}

<section class="{{ Request::route()->getName() == 'website.home-page' ? 'pt-80 pb-30' : 'services-area-six' }} py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 align-items-center">
                <div class="section-title-two text-center">
                    <h3 class="title tg-element-title">{{ __('Recommended MDW') }}</h3>
                </div>
            </div>
            <div class="col-md-12 my-5">
                <div class="row">
                    @php
                        $i = 4;
                        if(!Request::route()->getName() == 'website.home-page'){
                            $i = 16;
                        }

                    @endphp
                    @foreach($recommended_mdws as $k => $d)
                        @if($k < $i)
                        <div class="col-md-3">
                            <div class="card recommended-mdw-card" @if(Request::route()->getName() == 'website.home-page')  style="background-color:#f8faff" @endif>
                                <div class="flag-div p-2">
                                    <img
                                        src="{{ isset($d->nationality) ? \App\Services\GeneralService::getCountryImage($d->nationality) : asset('assets/website/img/flag/other.png') }}"
                                        alt="" class="">
                                </div>
                                <a href="{{ route('website.bio-data.show',$d->id) }}" target="_blank" class="stretched-link">
                                    <div class="avatar-div text-center">
                                        <img class="card-img-top" src="{{ \App\Services\GeneralService::getBioDataImage($d->photo) }}" alt="image">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title mt-3">
                                        <a href="{{ route('website.bio-data.show',$d->id) }}" target="_blank" class="stretched-link">
                                        {{ $d->name  }}
                                        </a>
                                    </h5>

                                    <div class="mt-3 d-flex flex-wrap gap-1">
                                        @isset($d->bio_data_type)
                                            @foreach($d->bio_data_type as $type)
                                                <span
                                                    class="bg-primary p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::bioDataTypeForDropdown($type)}}</span>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                                <div class="card-overlay">
                                    @isset($d->workExperienceWithEmployers)
                                    <div class="mb-3">
                                        <p class="mb-1 text-white fs-6">Experience</p>
                                        @foreach($d->workExperienceWithEmployers->unique('country_id') as $workExperience)
                                        @if($workExperience->country_id != null && $d->nationality != $workExperience->country_id)
                                        <span
                                            class="bg-danger p-1 fs-8 text-white rounded-2 m-1">
                                            Ex-{{ \App\Services\GeneralService::countryForDropdown($workExperience->country_id) }}
                                        </span>
                                        @elseif($d->nationality == $workExperience->country_id && $d->workExperienceWithEmployers->count() == 1)
                                        <span
                                        class="bg-danger p-1 fs-8 text-white rounded-2">
                                            {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                        </span>
                                        @elseif($workExperience->country_id == null && $d->workExperienceWithEmployers->count() == 1)
                                        <span
                                        class="bg-danger p-1 fs-8 text-white rounded-2">
                                            {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                        </span>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endisset
                                    @isset($d->bioDataDetail->recommended_helper)
                                    <p class="m-0 text-white fs-6">Recommended for</p>
                                        @foreach($d->bioDataDetail->recommended_helper as $data)
                                            <span class="bg-danger p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::categoryForDropdown($data)}}</span>
                                        @endforeach
                                    @endisset
                                    {{-- <a href="javascript:void(0)" class="text-white" onclick="DataTypeModal({{$d->id}});">View Details</a> --}}
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    @if(Request::route()->getName() == 'website.home-page')
                    <div class="text-center mt-5">
                        <a href="{{ route('website.bio-data.index') }}" class="btn">See More</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
