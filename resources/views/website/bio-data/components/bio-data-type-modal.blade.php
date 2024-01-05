
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
        </div>
    </div>
</div>
