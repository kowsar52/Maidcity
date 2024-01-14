<div class="row gy-3">
    @forelse($data as $d)
        @php
            $shortlistData = $d->shortlistBioData()->where('employer_id',auth()->id());
            $existShortlistData = $shortlistData->exists() ?? false;
        @endphp
        <div class="col-lg-6 col-md-12">
                <div class="border rounded-3 position-relative p-3 overflow-auto" style="height: 350px">
                    <div class="position-absolute end-0 @guest filter @endguest">
                        {{-- <a href="javascript:void(0)" id="saveToFavourite"
                           data-id="{{$d->id }}"
                           data-url="{{ ($existShortlistData) ? route('website.bio-data-shortlist.remove',$shortlistData->first()->id) : route('website.bio-data-shortlist.save',$d->id) }}" onmouseover="showText(this,{{ $d->id }})" onmouseout="hideText(this,{{ $d->id }})">
                            {!! (($existShortlistData) ? '<i class="fas fa-heart me-3"></i>' : '<i class="far fa-heart me-3"></i>') !!}
                            <span id="saveToFavouriteText{{ $d->id }}" style="display: none;">{{ (($existShortlistData) ? __('general.save_to_unfavourite') : __('general.save_to_favourite')) }}</span>
                        </a> --}}
                    </div>
                    <a href="{{route('website.bio-data.show',$d->id)}}">
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="{{ \App\Services\GeneralService::getBioDataImage($d->photo) }}" alt=""
                                 class="rounded-2 image_view">
                        </div>
                        <div class="col-6 ps-0 pe-2 @guest filter @endguest">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="flag-div">
                                    <img
                                        src="{{ isset($d->nationality) ? \App\Services\GeneralService::getCountryImage($d->nationality) : asset('assets/website/img/flag/other.png') }}"
                                        alt="" class="">
                                </div>
                                <div class="ms-2">
                                    @foreach($d->bio_data_type as $type)
                                        <span
                                            class="bg-primary p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::bioDataTypeForDropdown($type)}}</span>
                                    @endforeach
                                </div>

                            </div>
                            <div class="row align-items-center g-0 mt-3">
                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.ref_no')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">{{ \App\Services\FdwBioDataService::getPrefixId($d->id) }}</p>
                                </div>

                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.name')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">{{$d->name  ??'N/A'}}</p>
                                </div>

                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.nationality')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">{{isset($d->nationality) ? \App\Services\GeneralService::nationalityForDropdown($d->nationality) : 'N/A'}}</p>
                                </div>

                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.age')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">{{isset($d->age) ? $d->age.' '. __('general.years_old') : 'N/A'}}</p>
                                </div>

                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.passport')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">{!! ($d->passport_available == 'Yes') ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>' !!}</p>
                                </div>
                            </div>
                                {{--
                                <div class="col-5">
                                    <p class="fs-7 mb-0">{{__('general.experience')}}</p>
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    <p class="fs-7 mb-0">
                                        @foreach($d->workExperienceWithEmployers->unique('country_id') as $workExperience)
                                            @if($workExperience->country_id != null)
                                                @if($d->nationality != $workExperience->country_id)
                                                    Ex-{{ \App\Services\GeneralService::countryForDropdown($workExperience->country_id) }}
                                                    @if(!$loop->last)
                                                        ,
                                                    @endif
                                                @elseif($d->nationality == $workExperience->country_id && $d->workExperienceWithEmployers->count() == 1)
                                                    {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                                @endif
                                            @else
                                                {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div> --}}
                            <div class="">
                                @foreach($d->languageAbilities as $language)
                                <span
                                    class="bg-primary p-1 fs-8 text-white rounded-2">{{ ($language->language_id != null) ? \App\Services\GeneralService::languageForDropdown($language->language_id) : 'N/A'}}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 @guest filter @endguest">
                            {{-- <div class="mb-1">
                                <small class="text-dark me-1">{{ __('general.location') }}:</small>
                                <img
                                    src="{{isset($d->nationality) ? \App\Services\GeneralService::getCountryImage($d->nationality) : asset('assets/website/img/flag/other.png')}}" class="border"
                                    alt="Flag" style="width: auto; height: 25px;">
                            </div>
                            <div class="mb-1">
                                @if(isset($d->bio_data_type) && $d->bio_data_type != '')
                                    <small class="text-dark me-1">{{ __('general.bio_data_type') }}:</small>
                                @endif
                                @foreach($d->bio_data_type as $type)
                                    <span
                                        class="bg-primary p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::bioDataTypeForDropdown($type)}}</span>
                                @endforeach
                            </div>
                            <div class="mb-1">
                                <small class="text-dark me-1">{{ __('general.language') }}:</small>
                                @foreach($d->languageAbilities as $language)
                                    <span
                                        class="bg-primary p-1 fs-8 text-white rounded-2">{{ ($language->language_id != null) ? \App\Services\GeneralService::languageForDropdown($language->language_id) : 'N/A'}}</span>
                                @endforeach
                            </div> --}}
                            <div class="mb-1 d-flex flex-wrap gap-1">
                                <small class="text-dark me-1">{{ __('Experience ') }}:</small>
                                @foreach($d->workExperienceWithEmployers->unique('country_id') as $workExperience)
                                @if($workExperience->country_id != null)
                                    @if($d->nationality != $workExperience->country_id)
                                    <span
                                        class="bg-danger p-1 fs-8 text-white rounded-2">
                                        Ex-{{ \App\Services\GeneralService::countryForDropdown($workExperience->country_id) }}
                                    </span>
                                    @elseif($d->nationality == $workExperience->country_id && $d->workExperienceWithEmployers->count() == 1)
                                    <span
                                    class="bg-danger p-1 fs-8 text-white rounded-2">
                                        {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                    </span>
                                    @endif
                                @else
                                <span
                                        class="bg-danger p-1 fs-8 text-white rounded-2">
                                    {{ \App\Services\GeneralService::experienceLevelForDropdown(1) }}
                                </span>
                                @endif
                            @endforeach
                            </div>
                            <div class="mb-1 d-flex flex-wrap gap-1">
                                <small class="text-dark me-1">{{ __('Recommended for') }}:</small>
                                @forelse($d->bioDataDetail->recommended_helper as $r)
                                    <span
                                        class="bg-info p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::categoryForDropdown($r)}}</span>
                                @empty
                                    <span class="bg-danger p-1 fs-8 text-white rounded-2">N/A</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
        </div>
    @empty
        <div class="text-center">
            <h5 class="text-dark mb-0">{{ __('general.no_bio_data_available') }}</h5>
        </div>
    @endforelse
    @isset($page)
        <div class="col-12">
            {!! $data->appends(request()->query())->links() !!}
        </div>
    @endisset
</div>
