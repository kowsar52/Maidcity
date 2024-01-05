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
                        <h3 class="text-center my-3">{{ __('general.login') }}</h3>
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
                            {{ html()->form('POST',route('website.login-user'))->class('solid-validation')->open() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.email').'*','email') }}
                                        {{ html()->email('email')->id('email')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp position-relative">
                                        {{ html()->label(__('general.password').'*','password') }}
                                        {{ html()->password('password')->id('password')->required() }}
                                        <div class="password-eye-icon">
                                            <a href="javascript:void(0)" id="passwordShowHide">
                                                <i class="fas fa-eye-slash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        {{ html()->checkbox('remember',null,true)->class('form-check-input')->id('remember') }}
                                        {{ html()->label(__('general.remember_me'),'remember')->class('form-check-label') }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end mb-3">
                                        <a href="{{ route('website.password.request') }}">{{ __('general.forgot_password') }}</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ html()->submit(__('general.login'))->class('mb-3') }}
                                </div>
                                <div class="col-12 text-center">
                                    <a href="{{ route('website.register') }}">{{ __('general.register_here') }}</a>
                                    <a href="{{ route('website.home-page') }}" class="back-button"><i class="fas fa-arrow-left"></i> back</a>
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
    <script>
        $(document).on('click','#passwordShowHide',function (){
            const password = $("#password");
            if (password.attr('type') == 'password'){
                password.attr('type','text');
                $(this).html('<i class="fas fa-eye"></i>');
            } else {
                password.attr('type','password');
                $(this).html('<i class="fas fa-eye-slash"></i>');
            }
        });
    </script>
@endsection
