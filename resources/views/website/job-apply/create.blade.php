<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('general.job_id').': '.$job->id }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5>{{ __('general.thank_you_for_your_interest_in_this_job') }}</h5>
            <div class="contact-form m-0">
                {{ html()->form('POST',route('website.job-apply.store'))->class('solid-validation')->id('form_data')->open() }}
                {{ html()->hidden('job_id',$job->id) }}
                {{ html()->hidden('created_by',\Illuminate\Support\Facades\Auth::id()) }}
                @include('website.job-apply.field')
                {{ html()->submit(__('general.submit_now')) }}
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
</div>
