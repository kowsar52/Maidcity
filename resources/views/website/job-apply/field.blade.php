<div class="row">
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.full_name').'*','full_name') }}
            {{ html()->text('full_name')->id('full_name')->required() }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.nationality').'*','nationality') }}
            {{ html()->text('nationality')->id('nationality')->required() }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.date_of_birth').'*','date_of_birth') }}
            {{ html()->date('date_of_birth')->id('date_of_birth')->required() }}
            <small id="age" class="text-dark"></small>
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
            {{ html()->label(__('general.contact_number').'*','contact_number') }}
            {{ html()->text('contact_number')->id('contact_number')->required() }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.alternative_contact_number'),'alternative_contact_number') }}
            {{ html()->text('alternative_contact_number')->id('alternative_contact_number') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.whatsapp'),'whatsapp') }}
            {{ html()->text('whatsapp')->id('whatsapp') }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-grp">
            {{ html()->label(__('general.facebook_messenger_url'),'facebook_messenger_url') }}
            {{ html()->text('facebook_messenger_url')->id('facebook_messenger_url') }}
        </div>
    </div>
</div>
