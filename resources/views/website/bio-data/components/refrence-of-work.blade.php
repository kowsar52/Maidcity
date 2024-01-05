<div class="mt-4 mb-3 @guest filter @endguest">
    <h4 class="card-heading">{{__('general.this_helper_recommended_for')}}</h4>
    <div class="row g-3">
        @foreach(\App\Services\GeneralService::categoryForDropdown() as $key => $category)
            @php
                $recommended_helper_count = \App\Models\FdwBioDataDetail::where('fdw_bio_data_id',$model->id)->whereJsonContains('recommended_helper',$key)->count();
            @endphp
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" {{ (isset($model->bioDataDetail->recommended_helper) && $recommended_helper_count > 0) ? 'checked' : '' }} disabled>
                    <label class="form-check-label">
                        {{ $category }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
