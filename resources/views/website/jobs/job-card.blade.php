<div class="row g-3">
    <div class="col-md-4 position-relative">
            <div class="card border-0">
                <img src="{{ asset('assets/website/img/images/mdw-img.svg') }}" class="card-img-top" alt="{{ __('general.migrant_domestic_worker') }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('general.migrant_domestic_worker') }}</h5>
                    <p class="pb-5 mb-0">
                        {{ __('general.looking_for_a_friendly_family') }}
                    </p>
                </div>
            </div>
        <a href="{{ route('website.jobs',['type' => 'mdw']) }}"
           class="btn-custom btn-custom-primary position-absolute start-0 bottom-0 end-0 w-50 mx-auto">{{ __('general.find_out_more') }}</a>
    </div>
    <div class="col-md-4 position-relative">
            <div class="card border-0">
                <img src="{{ asset('assets/website/img/images/caregiver-img.svg') }}" class="card-img-top" alt="{{ __('general.caregiver') }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('general.caregiver') }}</h5>
                    <p class="pb-5 mb-0">
                        {{ __('general.experienced_in_caring_for_newborns') }}
                    </p>
                </div>
            </div>
        <a href="{{ route('website.jobs',['type' => 'caregiver']) }}"
           class="btn-custom btn-custom-primary position-absolute start-0 bottom-0 end-0 w-50 mx-auto">{{ __('general.find_out_more') }}</a>

    </div>
    <div class="col-md-4 position-relative">
            <div class="card border-0">
                <img src="{{ asset('assets/website/img/images/sale-consultant-img.svg') }}" class="card-img-top" alt="{{ __('general.sale_consultant') }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('general.sales_consultant') }}</h5>
                    <p class="pb-5 mb-0">
                        {{ __('general.looking_for_flexible_working_arrangements') }}
                    </p>
                </div>
            </div>
        <a href="{{ route('website.jobs',['type' => 'sales_consultant']) }}"
           class="btn-custom btn-custom-primary position-absolute start-0 bottom-0 end-0 w-50 mx-auto">{{ __('general.find_out_more') }}</a>

    </div>
</div>
