<!-- blog-area -->
<section class="blog-area-two blog-bg-two" data-background="assets/website/img/bg/h2_blog_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title-two text-center mb-50 tg-heading-subheading animation-style3">
                    {{-- <span class="sub-title">News & Blogs</span> --}}
                    <h2 class="title tg-element-title">{{ __('general.recommended_mdws') }}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($data as $d)
                <div class="col-lg-3 col-md-4">
                    <div class="blog-post-item-two @guest filter @endguest">
                        <div class="blog-post-thumb-two">
                            <a href="javascript:void(0)">
                                <img src="{{ \App\Services\GeneralService::getBioDataImage($d->photo) }}" alt=""
                                     class="img_height">
                            </a>
                            <a href="javascript:void(0)" class="tag_caregiver" onclick="DataTypeModal({{$d->id}});">
                                @foreach($d->bio_data_type as $bio)
                                    @if($loop->first)
                                        {{ isset($bio) ? \App\Services\GeneralService::bioDataTypeForDropdown($bio) : 'N/A' }}
                                    @endif
                                @endforeach
                            </a>
                            <div class="flag_div">
                                <img
                                    src="{{ isset($d->nationality) ? \App\Services\GeneralService::getCountryImage($d->nationality) : asset('assets/website/img/flag/other.png') }}"
                                    alt="" class="flag">
                            </div>
                        </div>
                        <div class="blog-post-content-two">
                            <div>
                                @foreach($d->overseasEmploymentHistories  as $record)
                                    @if($record->country_id)
                                        <span
                                            class="bg-warning p-2 fs-7 text-dark rounded-2">{{ isset($record->country_id) ? 'EX-'.\App\Services\GeneralService::getCountries($record->country_id) : 'N/A'}}</span>
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-2 d-flex flex-wrap gap-1">
                                @isset($d->bioDataDetail->care_of_babies)
                                    <span
                                        class="bg-danger p-2 fs-7 text-white rounded-2">{{__('general.baby_care')}}</span>
                                @endisset
                                @isset($d->bioDataDetail->routine_house_work)
                                    <span
                                        class="bg-danger p-2 fs-7 text-white rounded-2">{{__('general.housework')}}</span>
                                @endisset
                                @isset($d->bioDataDetail->cooking)
                                    <span
                                        class="bg-danger p-2 fs-7 text-white rounded-2">{{__('general.cooking')}}</span>
                                @endisset
                                @isset($d->bioDataDetail->care_of_children)
                                    <span
                                        class="bg-danger p-2 fs-7 text-white rounded-2">{{__('general.child_care')}}</span>
                                @endisset
                                @isset($d->bioDataDetail->care_of_special_child)
                                    <span
                                        class="bg-danger p-2 fs-7 text-white rounded-2">{{__('general.special_child')}}</span>
                                @endisset
                            </div>
                            <div class="mt-2">
                                @foreach($d->languageAbilities as $language)
                                    @if($language->name)
                                        <span
                                            class="bg-primary p-2 fs-7 text-white rounded-2">{{$language->name ?? 'N/A'}}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- blog-area-end -->
