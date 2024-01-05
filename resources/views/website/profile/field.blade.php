<div class="row align-items-center justify-content-center g-3">
    <div class="col-12">
        <div class="text-center">
            <img src="{{ isset(Auth::user()->photo) ? asset('storage/'.Auth::user()->photo) : asset('assets/images/default-user.png') }}" class="profile-image mb-3" id="previewProfile" alt="photo">
            <br>
            {{ html()->label(__('general.choose_file'),'photo')->class('btn-custom btn-custom-primary') }}
            {{ html()->file('photo')->class('d-none')->id('photo') }}
        </div>
    </div>
    <div class="col-12">
        <div class="contact-form m-0">
            <div class="form-grp">
                {{ html()->label(__('general.name').'*','name') }}
                {{ html()->text('name')->id('name')->required() }}
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-grp">
                {{ html()->label(__('general.email').'*','email') }}
                {{ html()->email('email')->id('email')->required() }}
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-grp">
                {{ html()->label(__('general.password').'*','password') }}
                {{ html()->password('password')->id('password')->value($model->current_password) }}
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
