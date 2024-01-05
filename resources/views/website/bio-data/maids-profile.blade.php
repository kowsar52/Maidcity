<section class="pb-80">
    <div class="container">
        <div class="row g-3">
            <div class="bg-custom-primary p-3 mb-3">
                <h3 class="text-white mb-0">{{ __('general.mdw_bio_data') }}</h3>
            </div>
            <div class="col-lg-4 col-md-6">
            @include('website.bio-data.components.search-input')
            </div>
            <div class="col-lg-8 col-md-6">
                @include('website.bio-data.components.profile-data')
            </div>
        </div>
    </div>
</section>
