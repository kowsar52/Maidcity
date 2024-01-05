<x-filament-panels::page>
    <div id="printArea" class="container mx-auto py-8">
        <h1 class="text-lg font-bold text-center">{{__('general.bio_data_print_title')}}</h1>
        <h1 class="text-xs text-center mb-4">{{__('general.bio_data_print_description')}}</h1>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">(A) <span class="border-b border-black">{{ __('general.profile_of_fdw') }}</span></h2>
            <h2 class="text-lg font-bold mb-4">A1. {{ __('general.personal_information') }}</h2>
            <h3 class="text-lg text-center font-bold mb-4">Ref No. {{ $record->id }}</h3>
            <div class="flex mb-2 gap-2">
                <div class="w-10/12">
                    <div class="mb-2 flex gap-4">
                        <label class="w-2/12 text-xs">{{ __('general.name') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->name }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.date_of_birth') }}:</label>
                        <div
                            class="border-b border-black w-4/12 text-xs">{{ \Carbon\Carbon::parse($record->date_of_birth)->format('d/m/Y') }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.age') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->age }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.place_of_birth') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->place_of_birth }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.height') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->height }} cm</div>
                        <label class="w-2/12 text-xs">{{ __('general.weight') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->weight }} kg</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.nationality') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->nationality }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.religion') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->religion }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-6/12 text-xs">{{ __('general.residential_address_in_home_country') }}:</label>
                        <div class="border-b border-black w-6/12 text-xs">{{ $record->residential_address_in_home_country }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-6/12 text-xs">{{ __('general.name_of_airport') }}:</label>
                        <div class="border-b border-black w-6/12 text-xs">{{ $record->name_of_airport }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-6/12 text-xs">{{ __('general.home_country_contact') }}:</label>
                        <div class="border-b border-black w-6/12 text-xs">{{ $record->contact_no_in_home_country }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.education') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->education_level }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.no_of_siblings') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->number_of_siblings }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.no_of_children') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->no_of_children }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.ages_of_children') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->age_of_children }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.martial_status') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ ($record->marital_status) ? \App\Services\GeneralService::maritalStatusForDropdown($record->marital_status) : '' }}</div>
                        @if($record->marital_status == 1)
                            <label class="w-2/12 text-xs">{{ __('general.husband_name') }}:</label>
                            <div class="border-b border-black w-4/12 text-xs">{{ $record->husband_name }}</div>
                        @endif
                    </div>
                    @if($record->marital_status == 1)
                        <div class="flex gap-4 mb-2">
                            <label class="w-2/12 text-xs">{{ __('general.age') }}:</label>
                            <div class="border-b border-black w-4/12 text-xs">{{ $record->husband_age }}</div>
                            <label class="w-2/12 text-xs">{{ __('general.occupation') }}:</label>
                            <div class="border-b border-black w-4/12 text-xs">{{ $record->husband_occupation }}</div>
                        </div>
                    @endif
                    <div class="flex gap-4 mb-2">
                        <label class="w-2/12 text-xs">{{ __('general.birth_order_in_family') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->birth_order_in_family }}</div>
                        <label class="w-2/12 text-xs">{{ __('general.other') }}:</label>
                        <div class="border-b border-black w-4/12 text-xs">{{ $record->others }}</div>
                    </div>
                </div>
                <div class="w-2/12">
                    <img src="{{ asset('storage/' . $record->photo) }}" alt="" class="mx-auto">
                </div>
            </div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">A2. {{ __('general.medical_history') }}</h2>
            <div class="flex gap-4 mb-2">
                <label class="w-1/12 text-xs">{{ __('general.allergies') }}:</label>
                <div
                    class="border-b border-black w-2/12 text-xs">{{ ($record->medicalHistory?->allergies && $record->medicalHistory?->allergies == 1) ? __('general.yes') : __('general.no') }}</div>
                @if( $record->medicalHistory?->allergies == 1)
                    <label class="w-2/12 text-xs">{{ __('general.allergies_detail') }}:</label>
                    <div
                        class="border-b border-black w-2/12 text-xs">{{ $record->medicalHistory->allergies_detail ?? '' }}</div>
                @endif
            </div>
            <label class="font-bold w-12/12 text-xs">{{ __('general.past_existing_illness') }}:</label>
            <div class="flex gap-4 mb-2">
                <label class="w-3/12 text-xs">1. {{ __('general.mental_illness') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('mental_illness',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">2. {{ __('general.epilepsy') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('epilepsy',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">3. {{ __('general.asthma') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('asthma',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                <label class="w-3/12 text-xs">4. {{ __('general.diabetes') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('diabetes',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">5. {{ __('general.hypertension') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('hypertension',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">6. {{ __('general.tuberculosis') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('tuberculosis',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                <label class="w-3/12 text-xs">7. {{ __('general.heart_disease') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('heart_disease',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">8. {{ __('general.malaria') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('malaria',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">9. {{ __('general.other') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('other',$record->medicalHistory?->past_existing_illness)) ? __('general.yes') : __('general.no') }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                @if(in_array('other',$record->medicalHistory?->past_existing_illness))
                    <label class="w-2/12 text-xs">{{ __('general.other_detail') }}:</label>
                    <div
                        class="border-b border-black w-2/12 text-xs">{{ $record->medicalHistory?->other_illness_detail ?? '' }}</div>
                @endif
                <label class="w-3/12 text-xs">{{ __('general.physical_disabilities') }}:</label>
                <div
                    class="border-b border-black w-1/12 text-xs">{{ ($record->medicalHistory?->physical_disabilities && $record->medicalHistory?->physical_disabilities == 1) ? __('general.yes') : __('general.no') }}</div>
                @if( $record->medicalHistory?->physical_disabilities == 1)
                    <label class="w-2/12 text-xs">{{ __('general.disability_details') }}:</label>
                    <div
                        class="border-b border-black w-2/12 text-xs">{{ $record->medicalHistory->physical_disabilities_detail ?? '' }}</div>
                @endif
                <label class="w-3/12 text-xs">{{ __('general.dietary_restrictions') }}:</label>
                <div
                    class="border-b border-black w-1/12 text-xs">{{ ($record->medicalHistory?->dietary_restrictions && $record->medicalHistory?->dietary_restrictions == 1) ? __('general.yes') : __('general.no') }}</div>
                @if( $record->medicalHistory?->dietary_restrictions_detail == 1)
                    <label class="w-2/12 text-xs">{{ __('general.restriction_details') }}:</label>
                    <div
                        class="border-b border-black w-2/12 text-xs">{{ $record->medicalHistory->dietary_restrictions_detail ?? '' }}</div>
                @endif
            </div>
            <label class="font-bold w-12/12 text-xs">{{ __('general.food_handling_preferences') }}:</label>
            <div class="flex gap-4 mb-2">
                <label class="w-3/12 text-xs">1. {{ __('general.no_pork') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('no_pork',$record->medicalHistory?->food_handling_preferences)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">2. {{ __('general.no_beef') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('no_beef',$record->medicalHistory?->food_handling_preferences)) ? __('general.yes') : __('general.no') }}</div>
                <label class="w-3/12 text-xs">3. {{ __('general.other') }}:</label>
                <div
                    class="font-bold w-1/12 text-xs">{{ (in_array('other',$record->medicalHistory?->food_handling_preferences)) ? __('general.yes') : __('general.no') }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                @if(in_array('other',$record->medicalHistory?->food_handling_preferences))
                    <label class="w-2/12 text-xs">{{ __('general.other_detail') }}:</label>
                    <div
                        class="border-b border-black w-2/12 text-xs">{{ $record->medicalHistory?->other_food_handling_preferences ?? '' }}</div>
                @endif
            </div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">A3. {{ __('general.other') }}</h2>
            <div class="flex gap-4 mb-2">
                <label class="w-2/12 text-xs">{{ __('general.preference_for_rest_day') }}:</label>
                <div
                    class="border-b border-black w-2/12 text-xs">{{ ($record->bioDataDetail?->preference_for_rest_day) ? \App\Services\GeneralService::getPreferenceForRestDay($record->bioDataDetail?->preference_for_rest_day) : '' }}</div>
                <label class="w-2/12 text-xs">{{ __('general.remarks_for_agent_only') }}:</label>
                <div class="border-b border-black w-4/12 text-xs">{{ $record->bioDataDetail?->any_other_remarks }}</div>
            </div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">(B) <span class="border-b border-black">{{ __('general.skills_of_fdw') }}</span></h2>
            <h2 class="text-lg font-bold mb-4">B1. {{ __('general.method_of_evaluation_of_skills') }}</h2>
            <div class="text-xs font-bold mb-4">{{ __('general.' . $record->method_of_evaluation_of_skills) }}</div>
            @if($record->method_of_evaluation_of_skills == 'interview_by_singapore')
                @foreach($record->interview_by_singapore_via as $val)
                    <ul class="ml-4 list-disc text-xs">
                        <li>{{ __('general.'. $val .'_interview') }}</li>
                    </ul>
                @endforeach
            @elseif($record->method_of_evaluation_of_skills == 'interview_by_overseas_training_centre')
                <div class="flex">
                    <label class="w-4/12 text-xs">{{ __('general.name_of_foreign_training_centre') }}:</label>
                    <div class="font-bold w-4/12 text-xs">{{ $record->name_of_foreign_training_centre }}
                    </div>
                </div>
                <div class="flex mb-2">
                    <label class="w-6/12 text-xs">{{ __('general.if_third_party_is_certified') }}:</label>
                    <div
                        class="font-bold w-4/12 text-xs">{{ $record->name_of_third_party_training_centre }}
                    </div>
                </div>
                @foreach($record->interview_by_overseas_training_centre_via as $val)
                    <ul class="ml-4 list-disc text-xs">
                        <li>{{ __('general.'. $val .'_interview') }}</li>
                    </ul>
                @endforeach
            @endif
            @if(isset($record->skillEvaluations)  && (count($record->skillEvaluations) > 0) && $record->method_of_evaluation_of_skills != 'based_on_fdw')
                <table class="border-collapse table-auto w-full text-xs">
                    <thead>
                    <tr>
                        <th class="border font-medium p-2 text-left">{{ __('general.s_no') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.area_of_work') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.willingness') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.experience') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.assessment_observations') }}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                    @foreach($record->skillEvaluations as $skillEvaluation)
                        <tr>
                            <td class="border p-2 pl-8">
                                {{ $loop->iteration }}</td>
                            <td class="border p-2 pl-8">
                                {{ ($skillEvaluation->area_of_work) ? \App\Services\GeneralService::getAreaOfWork($skillEvaluation->area_of_work) : '' }}</td>
                            <td class="border p-2">{{ ($skillEvaluation->willingness == 1) ? __('general.yes') : __('general.no') }}</td>
                            <td class="border p-2 pr-8">{{ ($skillEvaluation->experience == 1) ? __('general.yes') : __('general.no') }}</td>
                            <td class="border p-2 pr-8">
                                <div class="flex">
                                    @for($i = 1 ; $i <= 5 ; $i++)
                                        @if($skillEvaluation->assessment >= $i)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#e9d700"
                                                 class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">B2. {{ __('general.care_of_infant_child') }}</h2>
            @if(isset($record->careOfInfantChildrens) && (count($record->careOfInfantChildrens) > 0))
                <table class="border-collapse table-auto w-full text-xs">
                    <thead>
                    <tr>
                        <th class="border font-medium p-2 text-left">{{ __('general.title') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.willingness') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.experience') }}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                    @foreach($record->careOfInfantChildrens as $infantChild)
                        <tr>
                            <td class="border p-2 pl-8">
                                {{ (isset($infantChild->skill_title)) ? \App\Services\GeneralService::getInfantChildDropdown($infantChild->skill_title) : '' }}</td>
                            <td class="border p-2">{{ ($infantChild->willingness == 1) ? __('general.yes') : __('general.no') }}</td>
                            <td class="border p-2 pr-8">{{ ($infantChild->experience == 1) ? __('general.yes') : __('general.no') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">B3. {{ __('general.general_housework') }}</h2>
            @if(isset($record->generalHouseworks) && (count($record->generalHouseworks) > 0))
                <table class="border-collapse table-auto w-full text-xs">
                    <thead>
                    <tr>
                        <th class="border font-medium p-2 text-left">{{ __('general.title') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.willingness') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.experience') }}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                    @foreach($record->generalHouseworks as $houseWork)
                        <tr>
                            <td class="border p-2 pl-8">
                                {{ (isset($houseWork->work_title)) ? \App\Services\GeneralService::getGeneralHouseworkDropdown($houseWork->work_title) : '' }}</td>
                            <td class="border p-2">{{ ($houseWork->willingness == 1) ? __('general.yes') : __('general.no') }}</td>
                            <td class="border p-2 pr-8">{{ ($houseWork->experience == 1) ? __('general.yes') : __('general.no') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">B4. {{ __('general.language_abilities') }}</h2>
            @if(isset($record->languageAbilities) && (count($record->languageAbilities) > 0))
                <table class="border-collapse table-auto w-full text-xs">
                    <thead>
                    <tr>
                        <th class="border font-medium p-2 text-left">{{ __('general.title') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.other') }}</th>
                        <th class="border font-medium p-2 text-left">{{ __('general.rating') }}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                    @foreach($record->languageAbilities as $languageSpeak)
                        <tr>
                            <td class="border p-2 pl-8">
                                {{ ($languageSpeak->language_id) ? \App\Services\GeneralService::languageForDropdown($languageSpeak->language_id) : '' }}</td>
                            <td class="border p-2 pl-8">{{ $languageSpeak->other }}</td>
                            <td class="border p-2">
                                <div class="flex">
                                    @for($i = 1 ; $i <= 5 ; $i++)
                                        @if($languageSpeak->rating >= $i)
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ED1C24"
                                                 class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                      d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">(C) <span class="border-b border-black">{{ __('general.employment_history_of_the_fdw') }}</span></h2>
            <h2 class="text-lg font-bold mb-4">C1. {{ __('general.employment_history_in_singapore') }}</h2>
            <div class="flex">
                <label class="w-4/12 text-xs">{{ __('general.previous_working_experience_in_singapore') }}:</label>
                <div
                    class="font-bold w-4/12 text-xs">{{ ($record->previous_working_experience_in_singapore == 1) ? __('general.yes') : __('general.no') }}
                </div>
            </div>
            <div class="text-xs">{{ __('general.employment_history_in_singapore_description') }}</div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">
                C2. {{ __('general.feedback_from_previous_employers_in_singapore') }}</h2>
            <div class="text-xs">{{ __('general.feedback_from_previous_employers_in_singapore_description') }}</div>
            <table class="border-collapse table-auto w-full text-xs">
                <thead>
                <tr>
                    <th class="border font-medium p-2 text-center w-1/5"></th>
                    <th class="border font-medium p-2 text-center">{{ __('general.feedback') }}</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                <tr>
                    <td class="border p-2 pl-8">
                        {{ __('general.employer_one') }}</td>
                    <td class="border p-2 pl-8">
                        {{ $record->bioDataDetail?->prev_employer_one_feedback }}</td>
                </tr>
                <tr>
                    <td class="border p-2 pl-8">
                        {{ __('general.employer_two') }}</td>
                    <td class="border p-2 pl-8">
                        {{ $record->bioDataDetail?->prev_employer_two_feedback }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">
                C3. {{ __('general.work_experience') }}</h2>
            @if(isset($record->workExperienceWithEmployers) && (count($record->workExperienceWithEmployers) > 0))
                @foreach($record->workExperienceWithEmployers as $experience)
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs"><span class="font-bold">{{$loop->iteration}}</span> - {{ __('general.name_of_employer') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->name_of_employer }}</div>
                        <label class="w-3/12 text-xs">{{ __('general.date_from_to') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ \App\Services\GeneralService::dateFormat($experience->from_date) }} to {{ \App\Services\GeneralService::dateFormat($experience->to) }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.country_of_work') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ ($experience->country_id) ? \App\Services\GeneralService::getCountries($experience->country_id) : '' }}</div>
                        <label class="w-3/12 text-xs">{{ __('general.nationality') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->nationality }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.language_used') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->language }}</div>
                        <label class="w-3/12 text-xs">{{ __('general.type_of_house') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->type_of_house }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.members_in_family') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->members_in_family }}</div>
                        <label class="w-3/12 text-xs">{{ __('general.starting_last_salary') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->salary }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.age_of_children_elderly') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->age_of_children }}</div>
                        <label class="w-3/12 text-xs">{{ __('general.off_day_given') }}:</label>
                        <div
                            class="border-b border-black font-bold w-5/12 text-xs">{{ $experience->off_days_given }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.duties_in_detail') }}:</label>
                        <div
                            class="border-b border-black font-bold w-8/12 text-xs">{{ $experience->duties_detail }}</div>
                    </div>
                    <div class="flex gap-4 mb-2">
                        <label class="w-3/12 text-xs">{{ __('general.reason_for_leaving') }}:</label>
                        <div
                            class="border-b border-black font-bold w-8/12 text-xs">{{ $experience->reason_for_leaving }}</div>
                    </div>
                    @if(!$loop->last)
                        <hr class="mt-3 mb-3">
                    @endif
                @endforeach
            @endif
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">
                C4. {{ __('general.recommended_helper') }}</h2>
            <div class="mb-2">
                <div class="flex gap-4 mb-2">
                    <label class="w-3/12 text-xs">{{ __('general.baby_care') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('baby_care',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs">{{ __('general.child_care') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('child_care',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs">{{ __('general.cooking') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('cooking',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                </div>
                <div class="flex gap-4 mb-2">
                    <label class="w-3/12 text-xs">{{ __('general.disable_care') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('disable_care',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs">{{ __('general.elderly_care') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('elderly_care',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs">{{ __('general.housekeeping') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('housekeeping',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                </div>
                <div class="flex gap-4 mb-2">
                    <label class="w-3/12 text-xs">{{ __('general.pet_care') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('pet_care',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs">{{ __('general.marketing') }}:</label>
                    <div
                        class="font-bold w-1/12 text-xs">{{ (in_array('marketing',$record->bioDataDetail?->recommended_helper)) ? __('general.yes') : __('general.no') }}</div>
                    <label class="w-3/12 text-xs"></label>
                    <div class="w-1/12"></div>
            </div>
            </div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">(D) <span class="border-b border-black">{{ __('general.availability_of_fdw_to_be_interview') }}</span></h2>
            @foreach($record->bioDataDetail?->availability_of_fdw_for_interview as $d)
                <ul>
                    <li>
                        {{__('general.' . $d)}}
                    </li>
                </ul>
            @endforeach
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">(E) <span class="border-b border-black">{{ __('general.other_remarks') }}</span></h2>
            <div class="border-b border-black mb-4">{{$record->bioDataDetail?->fdw_other_details}}</div>
            <div class="flex gap-4 mb-2 mt-4">
                <div
                    class="border-b border-black font-bold w-4/12 text-xs">{{ $record->bioDataDetail?->personnel_name_reg_no }}</div>
                <div class="w-4/12"></div>
                <div
                    class="border-b border-black font-bold w-4/12 text-xs">{{ $record->bioDataDetail?->fdw_name_signature }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                <label class="w-4/12 text-xs">{{ __('general.fdw_name_signature') }}</label>
                <div class="w-4/12"></div>
                <label class="w-4/12 text-xs">{{ __('general.personnel_name_reg_no') }}</label>
            </div>
            <div class="flex gap-4 mb-4">
                <label class="w-2/12 text-xs">{{ __('general.date') }}:</label>
                <div
                    class="font-bold w-2/12 text-xs">{{ \App\Services\GeneralService::dateFormat($record->bioDataDetail?->fdw_date) ?? '' }}</div>
                <div class="w-4/12"></div>
                <label class="w-2/12 text-xs">{{ __('general.date') }}:</label>
                <div
                    class="font-bold w-2/12 text-xs">{{ \App\Services\GeneralService::dateFormat($record->bioDataDetail?->ea_personnel_date) ?? '' }}</div>
            </div>
            <div class="mt-4">
                {{ __('general.i_have_gone_through') }}
            </div>
            <div class="flex gap-4 mb-2 mt-4">
                <div
                    class="border-b border-black font-bold w-4/12 text-xs">{{ $record->bioDataDetail?->employer_nric_no }}</div>
            </div>
            <div class="flex gap-4 mb-2">
                <label class="w-4/12 text-xs">{{ __('general.employer_nric_no') }}</label>
            </div>
            <div class="flex gap-4 mb-4">
                <label class="w-2/12 text-xs">{{ __('general.date') }}:</label>
                <div
                    class="font-bold w-2/12 text-xs">{{ \App\Services\GeneralService::dateFormat($record->bioDataDetail?->employer_date) ?? '' }}</div>
            </div>
        </div>
        <div class="mb-5">
            <h2 class="text-lg font-bold mb-4">{{ __('general.imp_note_or_employers') }}</h2>
            <ul class="list-disc text-xs">
                <li>
                    Do consider asking for an FDW who is able to communicate in a language you require, and interview her (in
                    person/phone/videoconference) to ensure that she can communicate adequately.
                </li>
                <li>
                    Do consider requesting for an FDW who has a proven ability to perform the chores you require, for example, performing
                    household chores (especially if she is required to hang laundry from a high-rise unit), cooking and caring for young
                    children or the elderly.
                </li>
                <li>
                    Do work together with the EA to ensure that a suitable FDW is matched to you according to your needs and
                    requirements.
                </li>
                <li>
                    You may wish to pay special attention to your prospective FDW’s employment history and feedback from the FDW’s
                    previous employer(s) before employing her.
                </li>
            </ul>
        </div>
    </div>
</x-filament-panels::page>
