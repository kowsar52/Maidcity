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
    <div class="container my-5">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-md-5">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header bg-transparent">
                        <h3 class="text-center my-3">{{ __('general.register') }}</h3>
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
                            {{ html()->form('POST',route('website.register-user'))->class('solid-validation')->open() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.name').'*','name') }}
                                        {{ html()->text('name')->id('name')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.email').'*','email') }}
                                        {{ html()->email('email')->id('email')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.role').'*','role') }}
                                        {{ html()->select('role',\App\Services\UserService::getRoleForDropdown())->id('role')->placeholder(__('general.role'))->required() }}
                                    </div>
                                </div>
                                <div class="col-12" id="contactNumberDiv" style="display: none;">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.contact_number').'*','contact_number')->id('contactLabelText') }}
                                        {{ html()->text('contact_number')->id('contact_number') }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.password').'*','password') }}
                                        {{ html()->password('password')->id('password')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.confirm_password').'*','confirm_password') }}
                                        {{ html()->password('confirm_password')->id('confirm_password')->attribute('data-parsley-equalto','#password')->required() }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ html()->submit(__('general.register'))->class('mb-3') }}
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
    <script>
        $(document).on('change','#role', function (){
            const value = $(this).val();
            const contactNumberDiv = $('#contactNumberDiv');
            const contactNumber = $('#contact_number');
            const contactLabelText = $('#contactLabelText');
            if (value == 3){
                contactNumberDiv.show('slow');
                contactNumber.attr('required', false);
                contactLabelText.html('{{ __('general.contact_number') }}');
            } else if(value == 6){
                contactNumberDiv.show('slow');
                contactNumber.attr('required', true);
                contactLabelText.html('{{ __('general.contact_number').'*' }}');
            } else {
                contactNumberDiv.hide('slow');
                contactNumber.val('').attr('required', false);
            }
        });
    </script>
@endsection
