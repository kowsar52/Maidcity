@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->

    <!-- services-details-area -->
    <section class="services-details-area pt-80 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 order-0 order-lg-2">
                    <div class="services-details-wrap">
                         <h2 class="title text-center mb-3">{{$data->title}}</h2>
                        <div class="services-details-thumb text-center">
                            <img src="{{ isset($data->cover_image) ? asset('storage/'.$data->cover_image) : '' }}" alt=""
                                 class="w-75">
                        </div>
                        <div class="services-details-content text-center">
                            <p>{{$data->description}}</p>
                        </div>
                        <div class="d-sm-block text-center">
                            <a href="{{route('website.bio-data.index')}}" class="btn m-2">{{ __('general.find_helpers_now') }}</a>
                            <a href="{{ route('website.contact-us') }}" class="btn-warning m-2">{{ __('general.speak_to_an_agent') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
