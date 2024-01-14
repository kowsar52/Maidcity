
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('general.ref_no'). $data->id ?? 'N/A'}} ({{ $data->name}})</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5>{{__('general.bio_data_type')}}</h5>
            <ol>
                @foreach($data->bio_data_type as $bio)
                    <li> {{ isset($bio) ? \App\Services\GeneralService::bioDataTypeForDropdown($bio) : 'N/A' }}</li>
                @endforeach
            </ol>
            <h5>{{__('Category')}}</h5>
            @isset($d->bioDataDetail->recommended_helper)
                @foreach($d->bioDataDetail->recommended_helper as $key => $data)
                    @if($key < 4)
                    <span class="bg-danger p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::categoryForDropdown($data)}}</span>
                    @endif
                @endforeach
            @endisset
            <h5>{{__('Employment History')}}</h5>
            <ol>
                @foreach($data->overseasEmploymentHistories  as $record)
                    @if(isset($record->country_id))
                        <span class="bg-warning p-1 fs-8 text-dark rounded-2">{{ 'EX-'.\App\Services\GeneralService::getCountries($record->country_id)}}</span>
                    @endif
                @endforeach
            </ol>
            <h5>{{__('Language')}}</h5>
            @foreach($data->languageAbilities as $language)
                @if(isset($language->language_id))
                    <span class="bg-primary p-1 fs-8 text-white rounded-2">{{ \App\Services\GeneralService::languageForDropdown($language->language_id) ?? 'N/A'}}</span>
                @endif
            @endforeach
        </div>
    </div>
</div>
