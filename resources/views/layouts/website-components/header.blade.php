<div id="header-fixed-height"></div>
<header class="header-style-six">
    <div class="heder-top-wrap">
        <div class="mx-2">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="header-top-left">
                        <ul class="list-wrap">
                            @if(!empty(\App\Services\GeneralService::getContactDetail()->items))
                                <li><i class="flaticon-phone-call"></i></li>
                                @foreach(\App\Services\GeneralService::getContactDetail()->items as $key => $header)
                                    <li><span class="fw-bold">{{$header['branch_title'].' - ' }} </span> {{$header['contact_1']}}</li>
                                @endforeach
                            @else
                                {{--<li><i class="flaticon-phone-call"></i> <span class="fw-bold">Orchard</span> - 6734 6735</li>--}}
                                <li><i class="flaticon-phone-call"></i> <span class="fw-bold">Kovan</span> - 6241 6566</li>
                                <li><span class="fw-bold">Clementi</span> - 6260 6261</li>
                                <li><span class="fw-bold">Toa Payoh</span> - 6734 6735</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="header-top-right">
                        <div class="header-social">
                            <ul class="list-wrap">
                                <li><a href="https://www.facebook.com/maidcity"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://plus.google.com/105420983500050215511"><i class="fab fa-google-plus"></i></a></li>
                                <li><a href="https://twitter.com/JobuzzC"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/jobuzz-c-108475150/"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="menu-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="{{ route('website.home-page') }}"><img
                                        src="{{ asset('assets/website/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li @class(['active' => request()->routeIs('website.home-page') ])>
                                        <a href="{{ route('website.home-page') }}">{{ __('general.home') }}</a>
                                    </li>
                                    <li @class(['active' => request()->routeIs('website.about-us') ])>
                                        <a href="{{ route('website.about-us') }}">{{ __('general.about_us') }}</a></li>
                                    <li @class(['active' => request()->routeIs('website.services.index') ])>
                                        <a href="{{ route('website.services.index') }}">{{ __('general.services') }}</a></li>
                                    <li @class(['active' => request()->routeIs('website.contact-us') ])>
                                        <a href="{{ route('website.contact-us') }}">{{ __('general.contact_us') }}</a></li>
                                    <li @class(['active' => request()->routeIs('website.jobs') ])><a href="{{ route('website.jobs') }}">{{ __('general.jobs') }}</a></li>
                                    <li @class(['active' => request()->routeIs('website.bio-data') ])><a href="{{ route('website.bio-data.index') }}">{{ __('general.bio_data') }}</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-search"><a href="#"><i class="flaticon-search"></i></a></li>
                                    @guest
                                        <li class="header-btn"><a href="{{ route('website.login') }}" class="btn btn-two">{{ __('general.login') }}</a>
                                        </li>
                                    @endguest
                                   @auth
                                        <li>
                                            @include('layouts.website-components.profile-dropdown')
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('website.home-page') }}"><img
                                        src="{{ asset('assets/website/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="mobile-search pb-0">
                                <form action="#" class="mb-0">
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            @auth
                                <div class="d-flex justify-content-end p-3">
                                    @include('layouts.website-components.profile-dropdown')
                                </div>
                            @endauth
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix list-wrap">
                                    <li><a href="https://www.facebook.com/maidcity"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://plus.google.com/105420983500050215511"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="https://twitter.com/JobuzzC"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/jobuzz-c-108475150/"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>

    <!-- header-search -->
    <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="search-close">
            <span><i class="fas fa-times"></i></span>
        </div>
        <div class="search-wrap text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">... Search Here ...</h2>
                        <div class="search-form">
                            <form action="#">
                                <input type="text" name="search" placeholder="Type keywords here">
                                <button class="search-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-search-end -->

</header>
