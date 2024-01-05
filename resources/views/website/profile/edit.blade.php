@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->
    <div class="my-5">
        <div class="container">
            <div class="row justify-content-center g-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">{{ __('general.profile') }}</h3>
                        </div>
                        <div class="card-body">
                            {{ html()->modelForm($model,'POST',route('website.profile.update'))->class('solid-validation')->acceptsFiles()->open() }}
                            @include('website.profile.field')
                            <div class="text-center mt-3">
                                {{ html()->submit(__('general.update'))->class('btn-custom btn-custom-primary') }}
                            </div>
                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
                @if($employer_mdw_requirement)
                    <div class="col-md-6">
                        @include('website.profile.employer_mdw_requirement')
                    </div>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('Employer'))
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-transparent">
                                <h3 class="mb-0">{{ __('general.my_favourites') }}</h3>
                            </div>
                            <div class="card-body">
                                @include('website.bio-data.components.profile-data',['data' => $bio_data_shortlist])
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
    @include('website.bio-data.components.save-to-favourite-script')
    <script>
        $(document).on('change','#photo',function (){
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#previewProfile').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
