<div class="card">
    <div class="card-header bg-danger">
        <h3 class="text-white text-center mb-0">{{ __('general.advanced_search') }}</h3>
    </div>
    <div class="card-body">
        {{ html()->form('GET')->class('mb-0')->open() }}
        <div class="mb-3">
            {{ html()->label(__('general.nationality'))->class('form-label text-dark') }}
            {{ html()->select('nationality',  \App\Services\GeneralService::nationalityForDropdown(),request()->get('nationality'))->placeholder(__('general.nationality'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.bio_data_type'))->class('form-label text-dark') }}
            {{ html()->select('bio_data_type',  \App\Services\GeneralService::bioDataTypeForDropdown(),request()->get('bio_data_type'))->placeholder(__('general.bio_data_type'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.category'))->class('form-label text-dark') }}
            {{ html()->select('category',  \App\Services\GeneralService::categoryForDropdown(),request()->get('category'))->placeholder(__('general.category'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.experience_level'))->class('form-label text-dark') }}
            {{ html()->select('experience_level',  \App\Services\GeneralService::experienceLevelForDropdown(),request()->get('experience_level'))->placeholder(__('general.experience_level'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.marital_status'))->class('form-label text-dark') }}
            {{ html()->select('marital_status',  \App\Services\GeneralService::maritalStatusForDropdown(),request()->get('marital_status'))->placeholder(__('general.marital_status'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.languages'))->class('form-label text-dark') }}
            {{ html()->select('languages',  \App\Services\GeneralService::languageForDropdown(),request()->get('languages'))->placeholder(__('general.languages'))->class('select2 w-100') }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('general.age_range'))->class('form-label text-dark') }}
            {{ html()->select('age_range',  \App\Services\GeneralService::ageRageForDropdown(),request()->get('age_range'))->placeholder(__('general.age_range'))->class('select2 w-100') }}
        </div>
        {{ html()->submit(__('general.search'))->class('btn-custom btn-custom-primary w-100') }}
        {{ html()->form()->close() }}
    </div>
</div>
