@php
    $recommended_mdws = \App\Services\FdwBioDataService::getRecommendedMdws();
@endphp
<!-- project-area -->
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
<!-- project-area-end -->
