<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Realtors Club">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta-tag')
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/website/img/logo/favicon.png')}}">
    @yield('css-before')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/jarallax.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/floating-wpp.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/responsive.css')}}">
    @yield('css-after')
    @stack('styles')
    <title>{{ $pageTitle ?? '' }}</title>
</head>
<body>
    <!-- preloader -->
    @include('layouts.website-components.preloader')
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    @include('layouts.website-components.header')
    <main class="fix">
        @yield('content')
    </main>
    <!-- Floating Whatsapp -->
    <div id="floatingWhatsapp"></div>
    <div id="modalContent"></div>
    <div class="modal fade" id="bioDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
    @include('layouts.website-components.footer')
    <script src="{{asset('assets/website/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.odometer.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.appear.js')}}"></script>
    <script src="{{asset('assets/website/js/gsap.js')}}"></script>
    <script src="{{asset('assets/website/js/ScrollTrigger.js')}}"></script>
    <script src="{{asset('assets/website/js/SplitText.js')}}"></script>
    <script src="{{asset('assets/website/js/gsap-animation.js')}}"></script>
    <script src="{{asset('assets/website/js/jarallax.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.parallaxScroll.min.js')}}"></script>
    <script src="{{asset('assets/website/js/particles.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('assets/website/js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('assets/website/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/website/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/website/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/website/js/aos.js')}}"></script>
    <script src="{{asset('assets/website/js/floating-wpp.js')}}"></script>
    <script src="{{asset('assets/website/js/parsley.js')}}"></script>
    <script src="{{asset('assets/website/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/website/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/website/js/main.js')}}"></script>
    @include('layouts.website-components.facebook-floating-button')
    @include('layouts.website-components.global-script')
    @include('layouts.website-components.session-messages')
@yield('innerScriptFiles')
@yield('innerScript')
</body>


