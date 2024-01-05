<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Realtors Club">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/website/img/logo/favicon.png')}}">
    @yield('css-before')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/flaticon.css')}}">
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
<main class="fix">
    @yield('content')
</main>
<script src="{{asset('assets/website/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/website/js/parsley.js')}}"></script>
<script src="{{asset('assets/website/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/website/js/main.js')}}"></script>
@include('layouts.website-components.global-script')
@include('layouts.website-components.session-messages')
@yield('innerScriptFiles')
@yield('innerScript')
</body>


