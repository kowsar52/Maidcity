<x-filament-panels::page>
    <div class="light:bg-white darK:bg-black/50 p-3 rounded shadow">
        @if($record !== null)
            <div class="w-full mb-5">
                <h5 class="font-bold text-lg mb-3">1. {{ __('general.employer_question_answer1') }}</h5>
                <div class="flex gap-3">
                    @foreach(\App\Services\JobService::typeOfMDW() as $key => $answer)
                        <div class="flex items-center gap-x-3">
                            <input type="checkbox" class="border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 dark:bg-white/5 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10" name="answer1" id="answer1{{ $key }}" {{ ($record->whereJsonContains('answer1',(string)$key)->count() > 0) ? 'checked' : '' }} disabled>
                            <label for="answer1{{ $key }}">{{ $answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full mb-5">
                <h5 class="font-bold text-lg mb-3">2. {{ __('general.employer_question_answer2') }}</h5>
                <div class="flex gap-3">
                    @foreach(\App\Services\JobService::nationalityPreferred() as $key => $answer)
                        <div class="flex items-center gap-x-3">
                            <input type="checkbox" class="border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 dark:bg-white/5 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10" name="answer2" id="answer2{{ $key }}" {{ ($record->whereJsonContains('answer2',(string)$key)->count() > 0) ? 'checked' : '' }} disabled>
                            <label for="answer2{{ $key }}">{{ $answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full mb-5">
                <h5 class="font-bold text-lg mb-3">3. {{ __('general.employer_question_answer3') }}</h5>
                <div class="flex gap-3">
                    @foreach(\App\Services\GeneralService::categoryForDropdown() as $key => $answer)
                        <div class="flex items-center gap-x-3">
                            <input type="checkbox" class="border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 dark:bg-white/5 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10" name="answer3" id="answer3{{ $key }}" {{ ($record->whereJsonContains('answer3',$key)->count() > 0) ? 'checked' : '' }} disabled>
                            <label for="answer3{{ $key }}">{{ $answer }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full mb-5">
                <h5 class="font-bold text-lg mb-3">4. {{ __('general.employer_question_answer4') }}</h5>
                <p>{{ $record->answer4 }}</p>
            </div>
            <div class="w-full">
                <h5 class="font-bold text-lg mb-3">5. {{ __('general.employer_question_answer2') }}</h5>
                <div class="flex gap-3">
                    @foreach(\App\Services\GeneralService::getBranch() as $key => $branch)
                        <div class="flex items-center gap-x-3">
                            <input type="checkbox" class="border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 dark:bg-white/5 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10" name="answer5" id="answer3{{ $key }}" {{ ($record->whereJsonContains('answer5',(string)$key)->count() > 0) ? 'checked' : '' }} disabled>
                            <label for="answer3{{ $key }}">{{ $branch }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center">
                <p>No Data Available</p>
            </div>
        @endif
    </div>
</x-filament-panels::page>
