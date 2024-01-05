<div class="card">
    <div class="card-header bg-transparent">
        <h3 class="mb-0">{{ __('general.my_mdw_requirements') }}</h3>
    </div>
    <div class="card-body">
        <div class="card-title">
            <h5>{{ __('general.the_following_questions_will_help_us_serve_you_better') }}:</h5>
        </div>
        {{ html()->modelForm($employer_mdw_requirement,'PUT',route('website.employer-mdw-requirement.update',$employer_mdw_requirement->id))->class('solid-validation')->open() }}
        <div class="contact-form m-0">
            @include('website.employer-mdw-requirement.field',['model' => $employer_mdw_requirement])
        </div>
        <div class="text-center mt-3">
            {{ html()->submit(__('general.update'))->class('btn-custom btn-custom-primary') }}
        </div>
        {{ html()->closeModelForm() }}
    </div>
</div>
