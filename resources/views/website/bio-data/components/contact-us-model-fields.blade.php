<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                {{html()->label(__('general.your_name'),'name')}}
                {{html()->text('name')->class('form-control')->id('name')->value($employer->user->name ?? '')->disabled()}}
            </div>
            <div class="mb-3">
                {{html()->label(__('general.your_phone_number'),'contact_no_in_home_country')}}
                {{html()->text('contact_number')->class('form-control')->id('contact_number')->value($employer->contact_number ?? '')->disabled()}}
            </div>
            <div class="mb-3">
                {{html()->label(__('general.your_email'),'email')}}
                {{html()->email('email')->class('form-control')->id('email')->value($employer->user->email ?? '')->disabled()}}
            </div>
        </div>
        <div class="col-md-6">
            {{html()->textarea('message')->rows('4')->class('form-control mb-3')->required()->placeholder(__('general.your_message'))}}
            <p>{{ __('general.attend_enquiry') }}</p>
            <div class="mb-3">
                {{--<div class="form-check form-check-inline">
                    {{ html()->radio('branch_enquiry')->value('orchard@maidcity.com.sg')->class('form-check-input')->id('orchard')->required() }}
                    {{ html()->label()->text(__('general.orchard'))->for('orchard') }}
                </div>--}}
                <div class="form-check form-check-inline">
                    {{ html()->checkbox('branch_enquiry[]')->value('kovan@maidcity.com.sg')->class('form-check-input')->id('kovan') }}
                    {{ html()->label()->text(__('general.kovan'))->for('kovan') }}
                </div>
                <div class="form-check form-check-inline">
                    {{ html()->checkbox('branch_enquiry[]')->value('clementi@maidcity.com.sg')->class('form-check-input')->id('clementi') }}
                    {{ html()->label()->text(__('general.clementi'))->for('clementi') }}
                </div>
                <div class="form-check form-check-inline">
                    {{ html()->checkbox('branch_enquiry[]')->value('toapayoh@maidcity.com.sg')->class('form-check-input')->id('toa-payoh') }}
                    {{ html()->label()->text(__('general.toa_payoh'))->for('toa-payoh') }}
                </div>
            </div>
        </div>
    </div>
</div>
