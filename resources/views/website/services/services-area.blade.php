<!-- services-area -->
{{-- <section class="services-area-six">
    <div class="container">
        @isset($services)
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title-two  mb-30 text-center tg-heading-subheading animation-style3">
                        @if (Route::currentRouteName() == 'website.home-page')
                            <h2 class="title tg-element-title">{{ __('general.our_services') }}</h2>
                        @endif
                            <p>{{ $ourServicesHeading->items ?? __('general.services_intro') }}</p>
                    </div>
                </div>
            </div>
        @endisset
        <div class="row justify-content-center gy-5">
            @forelse($services as $d)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="card rounded-4 trasport-top h-100">
                        <a href="{{ route('website.services.show', $d->id) }}" class="h-100">
                            <div class="card-body text-center shadow rounded-4 h-100">
                                <img
                                    src="{{ isset($d->feature_image) ? asset('storage/'.$d->feature_image) : asset('assets/website/img/services/maid.png') }}"
                                    alt="service image" style="width: 135px; height: 93px; object-fit: cover; object-position: top;">
                                <h6 class="title mt-3 mb-0">{{ $d->title ?? 'N/A' }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h4>{{__('general.no_services_available')}}</h4>
                </div>
            @endforelse
            @if (Route::currentRouteName() == 'website.home-page')
                @isset($services)
                    <div class="col-12 text-center">
                        <a href="{{ route('website.services.index') }}" class="btn">
                            {{ __('general.find_out_more') }}
                        </a>
                    </div>
                @endisset
            @endif
        </div>
    </div>
</section> --}}
<div class="serviesType services-area-six">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-md-6 ">
                {{-- <div class="d-flex"> --}}
                    {{-- <div class="left"><img src="{{ asset('storage/services/feature_images/01HJ8KK0W3T5Z2D2949JYK5ZPE.jpg') }}" alt="" id="SERVICES_IMG"></div> --}}
                    <div class="rgt">
                    <h2 class="text-danger">Our Services</h2>
                    <h3>MaidCity</h3>
                    <p>Make sure that your home care needs are met. Choose from a vast pool of candidates spanning four nationalities: Indonesia, Myanmar, Mizoram (India) and the Philippines.</p>
                    <div class="padding10"></div>
                    <a href="{{ route('website.services.index') }}" class="commonBtn darkBlue">Find Out More</a>
                </div>
                {{-- </div> --}}
            </div>
            <div class="btns col-md-6 text-center">
                <ul>
                    @forelse($services as $d)
                    <li>
                        <a href="{{ route('website.services.show', $d->id) }}" class="">
                            <div class="btnGroup">
                                <div class="icon"><img src="{{ isset($d->feature_image) ? asset('storage/'.$d->feature_image) : asset('assets/website/img/services/maid.png') }}" alt="Maids"></div>
                                <div class="text fs-7 fw-bold">{{ $d->title ?? 'N/A' }}</div>
                            </div>
                        </a>
                    </li>
                    @empty
                    <div class="text-center">
                        <h4>{{__('general.no_services_available')}}</h4>
                    </div>
                    @endforelse
                    
                </ul>
            </div>
           
        </div>
    </div>
</div>
<!-- services-area-end -->
