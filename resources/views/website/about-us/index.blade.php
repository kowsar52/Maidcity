@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    @if(isset($aboutUs->items) && !empty($aboutUs->items))
        <section class="about-area-eight pt-100 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        {!! $aboutUs->items !!}
                    </div>
                </div>
            </div>
        </section>
    @else
        @include('website.about-us.who')
        @include('website.about-us.why')
    @endif

@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
