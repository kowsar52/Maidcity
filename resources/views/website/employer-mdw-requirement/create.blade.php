<div class="modal fade" id="employerMDWRequirementModal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5"
                    id="exampleModalLabel">{{ __('general.my_mdw_requirements') }}</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <h5>{{ __('general.the_following_questions_will_help_us_serve_you_better') }}:</h5>
                <div class="contact-form m-0">
                    {{ html()->form('POST',route('website.employer-mdw-requirement.store'))->class('solid-validation')->open() }}
                    @include('website.employer-mdw-requirement.field')
                    {{ html()->submit(__('general.submit')) }}
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
