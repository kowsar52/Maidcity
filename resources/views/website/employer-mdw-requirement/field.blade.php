<div class="row g-3 mb-3">
    <div class="col-12">
        {{ html()->label('1. '.__('general.employer_question_answer1')) }}
        <div class="row g-1">
            @foreach(\App\Services\JobService::typeOfMDW() as $key => $answer)
                @php
                    $answer1 = isset($model) ? \App\Models\EmployerMDWRequirement::where('id',$model->id)->whereJsonContains('answer1',(string)$key)->exists() : false;
                @endphp
                <div class="col-md-6">
                    <div class="form-check">
                        {{ html()->checkbox('answer1[]',$answer1,$key)->class('form-check-input')->id('answer1'.$key)->required() }}
                        {{ html()->label($answer,'answer1'.$key) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        {{ html()->label('2. '.__('general.employer_question_answer2')) }}
        <div class="row g-1">
            @foreach(\App\Services\JobService::nationalityPreferred() as $key => $answer)
                @php
                    $answer2 = isset($model) ? \App\Models\EmployerMDWRequirement::where('id',$model->id)->whereJsonContains('answer2',(string)$key)->exists() : false;
                @endphp
                <div class="col-md-6">
                    <div class="form-check">
                        {{ html()->checkbox('answer2[]',$answer2,$key)->class('form-check-input')->id('answer2'.$key)->required() }}
                        {{ html()->label($answer,'answer2'.$key) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        {{ html()->label('3. '.__('general.employer_question_answer3')) }}
        <div class="row g-1">
            @foreach(\App\Services\GeneralService::categoryForDropdown() as $key => $answer)
                @php
                    $answer3 = isset($model) ? \App\Models\EmployerMDWRequirement::where('id',$model->id)->whereJsonContains('answer3',$key)->exists() : false;
                @endphp
                <div class="col-md-6">
                    <div class="form-check">
                        {{ html()->checkbox('answer3[]',$answer3,$key)->class('form-check-input')->id('answer3'.$key)->required() }}
                        {{ html()->label($answer,'answer3'.$key) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        <div class="form-grp mb-0">
            {{ html()->label('4. '.__('general.employer_question_answer4'),'answer4') }}
            {{ html()->textarea('answer4')->id('answer4')->required() }}
        </div>
    </div>
    <div class="col-12">
        {{ html()->label('5. '.__('general.employer_question_answer5')) }}
        <div class="row g-1">
            @foreach(\App\Services\GeneralService::getBranch() as $key => $branch)
                @php
                    $answer5 = isset($model) ? \App\Models\EmployerMDWRequirement::where('id',$model->id)->whereJsonContains('answer5',(string)$key)->exists() : false;
                @endphp
                <div class="col-md-6">
                    <div class="form-check">
                        {{ html()->checkbox('answer5[]',$answer5,$key)->class('form-check-input')->id('answer5'.$key)->required() }}
                        {{ html()->label($branch,'answer5'.$key) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
