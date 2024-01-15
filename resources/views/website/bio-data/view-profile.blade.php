@extends('layouts.website')
@php
    $experience = isset($model->nationality) ? 'Ex-'.\App\Services\GeneralService::nationalityForDropdown($model->nationality) : '';
@endphp
@section('meta-tag')
    <meta property="og:title"         content="{{ $model->name }}"/>
    <meta property="og:description"   content="{{ $model->name }}, {{ $experience  }} from the {{ $experience  }}. She has experience in general household work like cleaning,laundry,ironing etc., she is responsible, confident and trustworthy. She Speaks English. She is good with children. She is good with elderly."/>
    <meta property="og:image"         content="{{ asset('assets/website/img/images/avatar.png') }}"/>
@endsection
@section('css-after')
    <style>
        table,th,td {
            font-size: 0.8rem;
        }
        .small-color {
            font-size: .8rem;
            color: #babab7;
            font-weight: 300;
        }

        .max-he {
            max-height: 560px;
        }
        .form-check-label{
            color: var(--bs-dark) !important;
            opacity: 1 !important;
            font-size: 13px !important;
        }
        .form-check-input:disabled {
            opacity: 1 !important;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @php
        $pageTitle = $model->name ?? $pageTitle;
    @endphp
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    <section class="services-area-six pb-50 pt-50">
        <div class="container">
        {{--@include('website.bio-data.components.flag')--}}
            @include('website.bio-data.components.refno-icon')
            @include('website.bio-data.components.details')
            @include('website.bio-data.components.maid-intro')
            @include('website.bio-data.components.medical-history')
            @include('website.bio-data.components.skills')
            @include('website.bio-data.components.additional-information')
            @include('website.bio-data.components.work-experience')
            @include('website.bio-data.components.refrence-of-work')
            {{--<div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-dark">
                        {{__('general.maid_reference')}} <b class="fw-bold text-danger">{{$model->id}}</b>
                        <br>
                        <a href="javascript:void(0)" data-url="{{route('website.bio-data.edit',[$model->id])}}" id="contactShow{{$model->id}}" class=" btn-custom btn-custom-primary rounded-pill px-4 contact-action" >
                            <span>{{__('general.contact_us')}}</span>
                        </a>
                    </div>
                </div>
            </div>--}}

        </div>
    </section>
    <div class="modal fade" id="contactShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
    @include('website.bio-data.components.share-social-media-icon-modal')
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
   @include('website.bio-data.components.script')
@endsection
