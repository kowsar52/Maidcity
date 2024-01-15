{{-- <section class="breadcrumb-area breadcrumb-bg p-0">
    <div class="">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if(!empty($sliderImg->items))
                @foreach($sliderImg->items as $images)
                    <div class="carousel-item @if($loop->iteration == 1) active @endif">
                        <img src="{{ asset('storage/'.$images) }}"
                             alt="" data-aos="fade-left" data-aos-delay="400" class="mb-2 w-100 slider_img_h">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block bg-gradient rounded-4 py-3" >
                            <h5 class="fs-1 text-white" data-aos="zoom-in-down">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h5>
                            <p class="fs-4 fw-bold text-white" data-aos="zoom-in-down" >{{ __('general.license_no_97C4834') }}</p>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="carousel-item active position-relative">
                        <img src="{{  asset('assets/website/test-slider.jpg') }}"
                             alt="" data-aos="fade-left" data-aos-delay="400" class="mb-2 w-100 slider_img_h">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block bg-gradient rounded-4 py-3">
                            <h5 class="fs-1 text-white " data-aos="fade-left" data-aos-delay="600">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h5>
                            <p class="fs-4 fw-bold text-white " data-aos="fade-left" data-aos-delay="750">{{ __('general.license_no_97C4834') }}</p>
                        </div>
                    </div>
                    <div class="carousel-item active position-relative">
                        <img src="{{  asset('assets/website/main-banner-slider-D2.png') }}"
                             alt="" data-aos="fade-left" data-aos-delay="400" class="mb-2 w-100 slider_img_h">
                        <div class="overlay"></div>
                        <div class="carousel-caption d-none d-md-block bg-gradient rounded-4 py-3">
                            <h5 class="fs-1 text-white " data-aos="fade-left" data-aos-delay="600">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h5>
                            <p class="fs-4 fw-bold text-white " data-aos="fade-left" data-aos-delay="750">{{ __('general.license_no_97C4834') }}</p>
                        </div>
                    </div>
                @endif

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div> --}}
{{--    <div class="container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="banner-content-two">--}}
{{--                    --}}{{-- <span class="sub-title" data-aos="fade-up" data-aos-delay="0">We Are Expert In This Field</span> --}}
{{--                    <h2 class="title" data-aos="fade-up"--}}
{{--                        data-aos-delay="300">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h2>--}}
{{--                    <p data-aos="fade-up" data-aos-delay="500">{{ __('general.license_no_97C4834') }}</p>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--                <div id="carouselExampleControls" class="carousel slide text-center" data-bs-ride="carousel">--}}
{{--                    <div class="carousel-inner">--}}
{{--                        @if($sliderImg->items)--}}
{{--                            @foreach($sliderImg->items as $images)--}}
{{--                                <div class="banner-img carousel-item @if($loop->iteration == 1) active @endif">--}}
{{--                                    <img src="{{ asset('storage/'.$images) }}"--}}
{{--                                         alt="" data-aos="fade-left" data-aos-delay="400" class="mb-2 w-50 slider_img_h rounded-4">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <div class="banner-img carousel-item active">--}}
{{--                                <img src="{{  asset('assets/website/img/banner/h2_banner_img.png') }}"--}}
{{--                                     alt="" data-aos="fade-left" data-aos-delay="400" class="mb-2 w-50">--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="banner-shape-wrap">--}}
{{--        <img src="{{ asset('assets/website/img/banner/h2_banner_shape01.png') }}" alt="">--}}
{{--        <img src="{{ asset('assets/website/img/banner/h2_banner_shape02.png') }}" alt="">--}}
{{--        <img src="{{ asset('assets/website/img/banner/h2_banner_shape03.png') }}" alt="" data-aos="zoom-in-up"--}}
{{--             data-aos-delay="800">--}}
{{--    </div>--}}
{{-- </section> --}}
<!-- Start Slider Area -->
<div class="intro-area intro-area-4 ">
    <div class="main-overly"></div>
     <div class="intro-carousel">
        @forelse($sliderImg->items as $images)
         <div class="intro-content">
             <div class="slider-images">
                 <img src="{{ asset('storage/'.$images) }}" alt="">
             </div>
             <div class="slider-content">
                 <div class="display-table">
                     <div class="display-table-cell">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-12">
                                     <!-- layer 1 -->
                                     <div class="layer-1">
                                         <h1 class="title2">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h1>
                                     </div>
                                     <!-- layer 2 -->
                                     <div class="layer-2 ">
                                         <p>{{ __('general.license_no_97C4834') }}</p>
                                     </div>
                                     <!-- layer 3 -->
                                     <div class="layer-3">
                                         <a href="{{ route('website.services.index') }}" class="ready-btn left-btn" >Our Services</a>
                                         <a href="{{ route('website.contact-us') }}" class="ready-btn right-btn" >Contact Us</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @empty
         <div class="intro-content">
            <div class="slider-images">
                <img src="{{  asset('assets/website/test-slider.jpg') }}" alt="">
            </div>
            <div class="slider-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- layer 1 -->
                                    <div class="layer-1">
                                        <h1 class="title2">{{ $slider->items ??  __('general.welcome_to_maidcity') }}</h1>
                                    </div>
                                    <!-- layer 2 -->
                                    <div class="layer-2 ">
                                        <p>{{ __('general.license_no_97C4834') }}</p>
                                    </div>
                                    <!-- layer 3 -->
                                    <div class="layer-3">
                                        <a href="{{ route('website.services.index') }}" class="ready-btn left-btn" >Our Services</a>
                                        <a href="{{ route('website.contact-us') }}" class="ready-btn right-btn" >Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endforelse
     </div>
 </div>
 <!-- End Appointment Area -->

