@extends('layouts.guest')
@section('css-after')
@endsection
@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-md-5">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-header bg-transparent">
                        <h3 class="text-center my-3">{{ __('general.user_import') }}</h3>
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
                            {{ html()->form('POST',route('website.user-import-store'))->class('solid-validation')->acceptsFiles()->open() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-grp">
                                        {{ html()->label(__('general.file').'*','file') }}
                                        {{ html()->file('file') }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ html()->submit(__('general.import'))->class('mb-3') }}
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
