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
                        <h3 class="text-center my-3">{{ __('general.reset_password') }}</h3>
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
                            {{ html()->form('POST',route('website.password.update'))->class('solid-validation')->open() }}
                            {{ html()->hidden('token',$token) }}
                            {{ html()->hidden('email',$email) }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.password').'*','password') }}
                                        {{ html()->password('password')->id('password')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.confirm_password').'*','confirm_password') }}
                                        {{ html()->password('confirm_password')->id('confirm_password')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ html()->submit(__('general.reset_password'))->class('mb-3') }}
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
