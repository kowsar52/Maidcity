@extends('layouts.website')
@section('css-after')
    <link rel="stylesheet" href="{{asset('assets/website/css/select2.min.css')}}">

    <style>
        .select2-container .select2-selection--single {
            height: 45px;
            font-size: 13px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 9px;
        }

        .blog-post-thumb-two .flag {
            width: 100%;
            height: 23px;
        }

        .recommended-mdw-card{
            height: 300px;
            position: relative;
            box-shadow: 0px 0px 10px 5px rgba(221,221,221,0.75);
            border:none;
        }
        .avatar-div img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .flag-div img{
            width: 25px;
            height: 20px;
            border-radius: 2px;
        }
        /* The overlay effect - lays on top of the container and over the image */
        .card-overlay {
            position: absolute;
            bottom: 0;
            background: #cd8285;
            color: white !important;
            width: 100%;
            transition: opacity 0.5s ease, transform 0.5s ease; /* Added transform for fade-in effect */
            opacity: 0;
            font-size: 14px;
            padding: 12px;
            transform: translateY(20px); /* Initial position, adjust as needed */
        }

        /* When you mouse over the container, fade in the overlay */
        .recommended-mdw-card:hover .card-overlay {
            opacity: 1;
            transform: translateY(0); /* Move the overlay to its original position */
        }

        @media (max-width: 767px) {
            .blog-post-thumb-two .flag {
                width: 100%;
                height: auto;
            }
        }

    </style>
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    @include('website.bio-data.maids',['heading' => true])
    @include('website.bio-data.maids-profile')

@endsection
@section('innerScriptFiles')
    <script src="{{asset('assets/website/js/select2.min.js')}}"></script>

@endsection
@section('innerScript')
    @include('website.bio-data.components.save-to-favourite-script')
<script>
     $(document).ready(function() {
         $('.select2').select2();

     });
</script>
@endsection
