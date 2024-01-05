@extends('layouts.guest')
@section('css-after')
    <style>
        body{
            background-color: var(--tg-primary-color);
        }
        .back-button {
            display: block;
            text-align: center;
            font-size: 13px;
        }
        .back-button:hover{
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-md-5">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header bg-transparent">
                        <h3 class="text-center my-3">{{ __('general.forgot_password') }}</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="contact-form m-0">
                            {{ html()->form('POST',route('website.password.email'))->class('solid-validation')->open() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.email').'*','email') }}
                                        {{ html()->email('email')->id('email')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ html()->submit(__('general.forgot_password'))->class('mb-3') }}
                                </div>
                                <div class="col-12 text-center">
                                    <a href="{{ route('website.login') }}">{{ __('general.back_to_login') }}</a>
                                </div>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
