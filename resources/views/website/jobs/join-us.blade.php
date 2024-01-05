<div class="row mt-5" style="{{ request()->query('type') === 'sales_consultant' ? 'display: block;' : 'display: none;' }}">
    <div class="col-12">
        <div class="bg-custom-primary p-3 mb-3">
            <h3 class="text-white mb-0">{{ __('general.sales_consultant') }}</h3>
        </div>
        <div class="card">
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
                    {{ html()->form('POST',route('website.join-us-store'))->class('solid-validation')->acceptsFiles()->open() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->label(__('general.name').'*','name') }}
                                {{ html()->text('name')->id('name')->required() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->label(__('general.email').'*','email') }}
                                {{ html()->email('email')->id('email')->required() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->label(__('general.phone').'*','phone') }}
                                {{ html()->text('phone')->id('phone')->required() }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->label(__('general.upload_your_cv').'*','file') }}
                                {{ html()->file('file')->id('file')->required() }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-grp">
                                {{ html()->label(__('general.please_specify_in_the_message_box_below').'*','message') }}
                                {{ html()->textarea('message')->id('message')->required() }}
                            </div>
                        </div>
                    </div>
                    {{ html()->submit(__('general.join_us')) }}
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>

