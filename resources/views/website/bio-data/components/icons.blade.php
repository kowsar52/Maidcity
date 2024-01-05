@php
    $shortlistData = $model->shortlistBioData()->where('employer_id',auth()->id());
    $existShortlistData = $shortlistData->exists() ?? false;
@endphp
<div class="row align-items-center justify-content-end gy-3">
    <div class="col-md-auto text-center px-5 px-md-3">
        <a href="javascript:void(0)" data-url="{{route('website.bio-data.edit',[$model->id])}}" id="contactShow{{$model->id}}" class=" btn-custom btn-custom-primary rounded-pill px-md-4 contact-action w-100" >
            <span>{{__('general.speak_to_an_agent')}}</span>
        </a>
    </div>
    <div class="col-md-auto text-center px-5 px-md-3">
        <a class="btn-custom btn-custom-light shadow-sm w-100" type="button" id="dropdownMenuButton1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-print me-3"></i>
            {{ __('general.pdf') }}
         </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item fs-7" href="{{route('website.print-pdf',convert_uuencode($model->id))}}" target="_blank"><i class="fa fa-file-pdf"></i> {{__('general.print_pdf')}}</a>
            </li>
            <li><a class="dropdown-item fs-7" href="{{route('website.mom-pdf',convert_uuencode($model->id))}}" target="_blank"><i class="fa fa-file-pdf"></i> {{__('general.mom_pdf')}}</a></li>
        </ul>
    </div>
    <div class="col-md-auto text-center px-5 px-md-3">
        <a href="javascript:void(0)" class="btn-custom btn-custom-light shadow-sm w-100" id="saveToFavourite" data-id="{{ $model->id }}" data-url="{{ ($existShortlistData) ? route('website.bio-data-shortlist.remove',$shortlistData->first()->id) : route('website.bio-data-shortlist.save',$model->id) }}">
            {!! (($existShortlistData) ? '<i class="fas fa-heart me-3"></i>'.__('general.save_to_unfavourite') : '<i class="far fa-heart me-3"></i>'.__('general.save_to_favourite')) !!}
        </a>
    </div>
    <div class="col-md-auto text-center px-5 px-md-3">
        <a href="javascript:void(0)" class="btn-custom btn-custom-light shadow-sm w-100" @auth data-bs-toggle="modal" data-bs-target="#shareSocialMediaIconModal" @endauth>
            <i class="fas fa-share-alt me-3"></i>
            {{ __('general.share') }}
        </a>
    </div>
</div>
