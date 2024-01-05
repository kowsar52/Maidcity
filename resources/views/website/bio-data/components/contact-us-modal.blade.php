<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <div class="w-100">
                <h1 class="modal-title fs-5 text-uppercase text-center" id="exampleModalLabel">{{__('general.im_interested_in_maid')}} {{__('general.ref_no')}} {{$model->id}} <br> {{ __('general.please_contact_me') }}</h1>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
            <div class="contact-form m-0">
                {{ html()->form('POST',route('website.bio-data.store'))->open() }}
                {{ html()->hidden('fdw_bio_data_id',$model->id) }}
                {{ html()->hidden('employer_id', $employer->id) }}
                {{ html()->hidden('status') }}
                @include('website.bio-data.components.contact-us-model-fields')
                <div class="text-center">
                    {{ html()->submit(__('general.submit'))->class('w-25') }}
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
        <div class="modal-footer w-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p class="mb-0">{{__('general.toa_payoh')}}</p>
                        <span>{{__('general.orchard_number')}}</span>
                    </div>
                    <div class="col text-center">
                        <p class="mb-0">{{__('general.kovan')}}</p>
                        <span>{{__('general.kovan_number')}}</span>
                    </div>
                    <div class="col text-end">
                        <p class="mb-0">{{__('general.clementi')}}</p>
                        <span>{{__('general.clementi_number')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
