@extends('layouts.website')
@section('css-after')
    <style>
        .mapouter {
            position: relative;
            height: 301px;
            width: 100%;
            background: #fff;
        }

        .gmap_canvas {
            overflow: hidden;
            height: 301px;
            width: 100%
        }

        .gmap_canvas iframe {
            position: relative;
            z-index: 2
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    @include('website.contact-us.contact-area')

    <!-- contact-map -->
    {{-- <div class="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.332792000835!2d144.96011341744386!3d-37.805673299999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sbd!4v1685027435635!5m2!1sen!2sbd"
            allowfullscreen loading="lazy"></iframe>
    </div> --}}
    <!-- contact-map-end -->
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
