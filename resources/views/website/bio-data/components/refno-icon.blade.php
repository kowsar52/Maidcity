<div class="row @guest filter @endguest g-3">
    <div class="col-md-4">
        <img src="{{isset($model->nationality) ? \App\Services\GeneralService::getCountryImage($model->nationality) : asset('assets/website/img/flag/other.png')}}" alt="" class="border w-25">
    </div>
    <div class="col-md-8 d-flex justify-content-end align-items-end">
       @include('website.bio-data.components.icons')
    </div>
</div>
