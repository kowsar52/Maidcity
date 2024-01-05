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
