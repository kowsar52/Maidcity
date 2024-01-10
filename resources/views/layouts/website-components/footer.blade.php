<footer>
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top">
                <div class="row mb-3">
                        @if(isset(\App\Services\GeneralService::getContactDetail()->items))
                            @foreach(\App\Services\GeneralService::getContactDetail()->items as $key => $foooter)
                            <div class="col-sm-6 col-md-4">
                                <div class="footer-widget">
                                    <h4 class="fw-title">{{ $foooter['branch_title'] }}</h4>
                                    <div class="footer-info">
                                        <ul class="list-wrap">
                                            <li>
                                                <div class="icon">
                                                    <i class="flaticon-pin"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{ $foooter['address'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="flaticon-phone-call"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{ $foooter['contact_1'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="fab fa-whatsapp"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{ $foooter['contact_2'] }}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <i class="flaticon-mail"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{ $foooter['email'] }}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="col-sm-6 col-md-4">
                            <div class="footer-widget">
                                <h4 class="fw-title">{{ __('general.Kovan_branch') }}</h4>
                                <div class="footer-info">
                                    <ul class="list-wrap">
                                        <li>
                                            <div class="icon">
                                                <i class="flaticon-pin"></i>
                                            </div>
                                            <div class="content">
                                                <p>{{ __('general.kovan_address') }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="flaticon-phone-call"></i>
                                            </div>
                                            <div class="content">
                                                <p>{{ __('general.kovan_number') }}</p>
                                            </div>
                                        </li>
                                        {{--<li>
                                            <div class="icon">
                                                <i class="flaticon-telephone"></i>
                                            </div>
                                            <div class="content">
                                                <p>{{ __('general.orchard_number2') }}</p>
                                            </div>
                                        </li>--}}
                                        <li>
                                            <div class="icon">
                                                <i class="flaticon-mail"></i>
                                            </div>
                                            <div class="content">
                                                <p>{{ __('general.kovan_email') }}</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    <!--<div class="col-lg-4 col-md-7">
                        <div class="footer-widget">
                            <h4 class="fw-title">Subscribe to Our Newsletter</h4>
                            <div class="footer-newsletter">
                                <p>Sign up to Privitar’s weekly newsletter to get the latest updates.</p>
                                <form action="#">
                                    <input type="email" placeholder="enter your e-mail">
                                    <button type="submit">Subscribe</button>
                                </form>
                                <span>We don’t send you any spam</span>
                            </div>
                        </div>
                    </div>-->
                {{-- </div> --}}
                {{-- <div class="row"> --}}
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">{{ __('general.menu') }}</h4>
                            <div class="footer-link">
                                <ul class="list-wrap">
                                    <li @class(['active' => request()->routeIs('website.home-page')])>
                                        <a href="{{ route('website.home-page') }}">{{ __('general.home') }}</a>
                                    </li>
                                    <li @class(['active' => request()->routeIs('website.about-us')])>
                                        <a href="{{ route('website.about-us') }}">{{ __('general.about_us') }}</a>
                                    </li>
                                    <li @class(['active' => request()->routeIs('website.services')])>
                                        <a href="{{ route('website.services.index') }}">{{ __('general.services') }}</a>
                                    </li>
                                    <li @class(['active' => request()->routeIs('website.contact-us')])>
                                        <a href="{{ route('website.contact-us') }}">{{ __('general.contact_us') }}</a>
                                    </li>
                                    <li><a href="javascript:void(0)">{{ __('general.jobs') }}</a></li>
                                    <li><a href="{{route('website.bio-data.index')}}">{{ __('general.bio_data') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Quick Links</h4>
                            <div class="footer-link">
                                <ul class="list-wrap">
                                    @foreach(\App\Services\GeneralService::getServicesForFooter() as $service)
                                        <li>
                                            <a href="{{ route('website.services.show', $service->id) }}">{{ $service->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area bg-white">
        <div class="container">
            <div class="footer-bottom border-0">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="left-sider">
                            <div class="f-logo">
                                <a href="{{ route('website.home-page') }}"><img src="{{ asset('assets/website/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright-text">
                            <p>Copyright © Maidcity | All Right Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-social">
                            <ul class="list-wrap">
                                <li><a href="https://www.facebook.com/maidcity"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="https://plus.google.com/105420983500050215511"><i
                                            class="fab fa-google-plus"></i></a></li>
                                <li><a href="https://twitter.com/JobuzzC"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/jobuzz-c-108475150/"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
