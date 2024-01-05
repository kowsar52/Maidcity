<!-- services-area -->
<section class="services-area-six">
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
                        <a href="{{ route('website.services.index') }}" class="btn btn-primary">
                            {{ __('general.find_out_more') }}
                        </a>
                    </div>
                @endisset
            @endif
        </div>
    </div>
</section>
<!-- services-area-end -->
