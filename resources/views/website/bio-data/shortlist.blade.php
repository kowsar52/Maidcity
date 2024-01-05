@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    <div class="container my-5">
        @include('website.bio-data.components.profile-data')
    </div>
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
    @include('website.bio-data.components.save-to-favourite-script')
@endsection

