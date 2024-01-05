<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FdwBioDataResource\Pages;
use App\Filament\Resources\FdwBioDataResource\RelationManagers;
use App\Models\Employer;
use App\Models\FdwBioData;
use App\Models\FdwBioDataLog;
use App\Models\HiredFDW;
use App\Services\GeneralService;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class FdwBioDataResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = FdwBioData::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'MDW Biodata';
    protected static ?string $navigationGroup = 'MDW';
    protected static ?string $breadcrumb = 'MDW Biodata';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make(__('general.personal_information'))
                        ->schema([
                            Section::make(__('general.personal_information'))
                                ->schema([
                                    TextInput::make('id')
                                        ->label(__('general.ref_no'))
                                        ->default(function () {
                                            $record = FdwBioData::select('id')->latest()->first();
                                                return isset($record) ? $record->id + 1 : 1;
                                        })
                                        ->disabled(),
                                    Select::make('bio_data_type')
                                        ->options(GeneralService::bioDataTypeForDropdown())
                                        ->multiple()
                                        ->native(false)
                                        ->required()
                                        ->live(),
                                    DatePicker::make('date_of_last_medical')
                                        ->native(false)
                                        ->visible(fn(Get $get): bool => (in_array(4, $get('bio_data_type'))))
                                        ->required(fn(Get $get): bool => (in_array(4, $get('bio_data_type')))),
                                    TextInput::make('name')
                                        ->rules([
                                            fn(FdwBioData $record = null, Get $get): \Closure => function (string $attribute, $value, \Closure $fail) use ($record, $get) {
                                                $existingValue = FdwBioData::where('name', $value)
                                                    ->where('date_of_birth', $get('date_of_birth'))
                                                    ->where('nationality', $get('nationality'));
                                                if ($record) {
                                                    $existingValue = $existingValue->whereNot('id', $record->id);
                                                }
                                                $existingValue = $existingValue->first();
                                                if ($existingValue) {
                                                    $fail('The name and date of birth and nationality is already exist');
                                                    Notification::make()
                                                        ->title('The name and date of birth and nationality is already exist')
                                                        ->danger()
                                                        ->send();
                                                }
                                            },
                                        ])
                                        ->required(),
                                    DatePicker::make('date_of_birth')
                                        ->native(false)
                                        ->live()
                                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('age', Carbon::parse($state)->age)),
                                    TextInput::make('age')
                                        ->numeric(),
                                    TextInput::make('place_of_birth'),
                                    TextInput::make('height')
                                        ->label(__('general.height_cm'))
                                        ->numeric(),
                                    TextInput::make('weight')
                                        ->label(__('general.weight_kg'))
                                        ->numeric(),
                                    Select::make('nationality')
                                        ->options(GeneralService::nationalityForDropdown())
                                        ->searchable()
                                        ->native(false),
                                    TextInput::make('residential_address_in_home_country'),
                                    TextInput::make('name_of_airport')
                                        ->label(__('general.name_of_airport')),
                                    Select::make('religion')
                                        ->options(GeneralService::getReligion())
                                        ->searchable()
                                        ->native(false),
                                    Select::make('education_level')
                                        ->options(GeneralService::getEducation())
                                        ->searchable()
                                        ->native(false),
                                    TextInput::make('number_of_siblings')
                                        ->numeric(),
                                    TextInput::make('birth_order_in_family')
                                        ->numeric(),
                                    TextInput::make('others'),
                                    TextInput::make('no_of_children'),
                                    TextInput::make('age_of_children')->label('Age(s) of children (if any)'),
                                    Select::make('marital_status')
                                        ->options(GeneralService::maritalStatusForDropdown())
                                        ->native(false)->live(),
                                    Select::make('passport_available')
                                        ->options([
                                            'Yes' => 'Yes',
                                            'No' => 'No',
                                        ])
                                        ->native(false),
                                    /*TextInput::make('husband_name')
                                        ->visible(fn(Get $get): bool => $get('marital_status') == 1),
                                    TextInput::make('husband_age')
                                        ->visible(fn(Get $get): bool => $get('marital_status') == 1),
                                    TextInput::make('husband_occupation')
                                        ->visible(fn(Get $get): bool => $get('marital_status') == 1),*/
                                ])->collapsible()->columns(3),
                            Section::make(__('general.contact_info'))
                                ->description('Please provide all your contact details below. This information will not be shared to third party. It will be used
                                by our office to get in touch with you as regards to your application to work in Singapore, or when we need
                                more information from you. Please make sure you indicate your Facebook details so that we can send you a
                                message if we cannot get in touch with you. You can provide more then one phone numbers or any other
                                contact information too.')
                                ->schema([
                                    TextInput::make('contact_no_in_singapore_country')
                                        ->label(__('general.singapore_country_contact'))
                                        ->numeric(),
                                    TextInput::make('contact_no_in_home_country')
                                        ->label(__('general.home_country_contact'))
                                        ->numeric(),
                                    TextInput::make('facebook_url')
                                        ->label(__('general.facebook'))
                                        ->placeholder('https://www.facebook.com/'),
                                    TextInput::make('ym_skype')
                                        ->label(__('general.whatsapp')),
                                    TextInput::make('email')
                                        ->label(__('general.email'))
                                        ->email(),
                                    TextInput::make('other_contact')
                                        ->label(__('general.other_social_media_ids')),
                                ])->collapsible()->columns(3)

                        ]),
                    Wizard\Step::make(__('general.medical_history'))
                        ->schema([
                            Group::make()
                                ->relationship('medicalHistory')
                                ->schema([
                                    Select::make('allergies')
                                        ->options([
                                            0 => 'No',
                                            1 => 'Yes',
                                        ])->native(false)
                                        ->default(0)
                                        ->selectablePlaceholder(false)
                                        ->live(),
                                    TextInput::make('allergies_detail')
                                        ->visible(fn(Get $get): bool => $get('allergies') == 1),
                                    CheckboxList::make('past_existing_illness')
                                        ->label(__('general.past_existing_illness'))
                                        ->options([
                                            'mental_illness' => 'Mental Illness',
                                            'epilepsy' => "Epilepsy's",
                                            'asthma' => 'Asthma',
                                            'diabetes' => 'Diabetes',
                                            'hypertension' => 'Hypertension',
                                            'tuberculosis' => 'Tuberculosis',
                                            'heart_disease' => 'Heart disease',
                                            'malaria' => 'Malaria',
                                            'operations' => 'Operations',
                                            'other' => 'Other',
                                        ])
                                        ->live()
                                        ->columns(3)
                                        ->columnSpan(3),
                                    TextInput::make('other_illness_detail')
                                        ->visible(function (Get $get): bool {
                                            foreach ($get('past_existing_illness') as $value) {
                                                if ($value == 'other') {
                                                    return true;
                                                }
                                            }
                                            return false;
                                        }),
                                    Select::make('physical_disabilities')
                                        ->options([
                                            0 => 'No',
                                            1 => 'Yes',
                                        ])->native(false)
                                        ->live()
                                        ->default(0)
                                        ->selectablePlaceholder(false),
                                    TextInput::make('physical_disabilities_detail')
                                        ->visible(fn(Get $get): bool => $get('physical_disabilities') == 1),
                                    Select::make('dietary_restrictions')
                                        ->options([
                                            0 => 'No',
                                            1 => 'Yes',
                                        ])->native(false)
                                        ->live()
                                        ->default(0)
                                        ->selectablePlaceholder(false),
                                    TextInput::make('dietary_restrictions_detail')
                                        ->visible(fn(Get $get): bool => $get('dietary_restrictions') == 1),
                                    CheckboxList::make('food_handling_preferences')
                                        ->options([
                                            'no_pork' => 'No pork',
                                            'no_beef' => 'No beef',
                                            'other' => 'Other',
                                        ])
                                        ->live()
                                        ->columns(3)
                                        ->columnSpanFull(),
                                    TextInput::make('other_food_handling_preferences')
                                        ->visible(function (Get $get): bool {
                                            foreach ($get('food_handling_preferences') as $value) {
                                                if ($value == 'other') {
                                                    return true;
                                                }
                                            }
                                            return false;
                                        }),
                                ])->columns(3),
                        ]),
                    Wizard\Step::make(__('general.skills_of_fdw'))
                        ->schema([
                            Section::make(__('general.method_of_evaluation_of_skills'))
                                ->schema([
                                    Select::make('method_of_evaluation_of_skills')
                                        ->label(__('general.select_the_method_s_used_to_evaluate_the_fdw'))
                                        ->options([
                                            'based_on_fdw' => __('general.based_on_fdw'),
                                            'interview_by_singapore' => __('general.interview_by_singapore'),
                                            'interview_by_overseas_training_centre' => __('general.interview_by_overseas_training_centre'),
                                        ])->native(false)
                                        ->live(),
                                    Grid::make()
                                        ->schema([
                                            CheckboxList::make('interview_by_singapore_via')
                                                ->options([
                                                    'teleconference' => __('general.teleconference_interview'),
                                                    'videoconference' => __('general.videoconference_interview'),
                                                    'person' => __('general.person_interview'),
                                                    'observed_work' => __('general.observed_work_interview'),
                                                ]),
                                        ])
                                        ->visible(fn(Get $get): bool => $get('method_of_evaluation_of_skills') == 'interview_by_singapore'),
                                    Grid::make()
                                        ->schema([
                                            TextInput::make('name_of_foreign_training_centre')
                                                ->label(__('general.name_of_foreign_training_centre')),
                                            TextInput::make('name_of_third_party_training_centre')
                                                ->label(__('general.if_third_party_is_certified')),
                                            CheckboxList::make('interview_by_overseas_training_centre_via')
                                                ->options([
                                                    'teleconference' => __('general.telephone_interview'),
                                                    'videoconference' => __('general.videoconference_interview'),
                                                    'person' => __('general.person_interview'),
                                                    'observed_work' => __('general.observed_work_interview'),
                                                ]),
                                        ])->visible(fn(Get $get): bool => $get('method_of_evaluation_of_skills') == 'interview_by_overseas_training_centre'),
                                    Repeater::make('singapore_skill_evaluation')
                                        ->relationship('skillEvaluations')
                                        ->schema([
                                            Select::make('area_of_work')
                                                ->options(GeneralService::getAreaOfWork())
                                                ->native(false)
                                                ->disabled()
                                                ->dehydrated(),
                                            Toggle::make('willingness')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->default(true),
                                            Toggle::make('experience')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false),
                                            Radio::make('assessment')
                                                ->label('Assessment/Observation')
                                                ->options([
                                                    1 => '1',
                                                    2 => '2',
                                                    3 => '3',
                                                    4 => '4',
                                                    5 => '5',
                                                ])
                                                ->inline()
                                                ->columnSpan(3),
                                            TextInput::make('age_range')
                                            ->visible(fn(Get $get):bool => ($get('area_of_work') == 1)),
                                            CheckboxList::make('food_handling_preferences')
                                            ->options(GeneralService::getFoodHandlingPreferences())
                                            ->visible(fn(Get $get):bool => ($get('area_of_work') == 5))
                                            ->columns(3),
                                            Textarea::make('name_dishes')
                                            ->rows(3)
                                            ->visible(fn(Get $get):bool => ($get('area_of_work') == 5))
                                            ->columnSpan(3)
                                        ])
                                        ->columnSpanFull()
                                        ->defaultItems(5)
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                        ->visible(function (Get $get, Set $set, Component $component): bool {
                                            $condition = $get('method_of_evaluation_of_skills') === 'interview_by_overseas_training_centre'
                                                || $get('method_of_evaluation_of_skills') === 'interview_by_singapore' || $get('method_of_evaluation_of_skills') === 'based_on_fdw';

                                            if ($condition) {
                                                $records = $get('singapore_skill_evaluation');
                                                $keys = collect($records)->keys();
                                                $i = 1;
                                                foreach ($keys as $key) {
                                                    $set('singapore_skill_evaluation.' . $key . '.area_of_work', $i);
                                                    $i++;
                                                }

                                                return true;
                                            }
                                            return false;
                                        }),
                                    TextInput::make('other_skill')
                                    ->label(__('general.other_skills_if_any'))
                                ]),
                            Section::make(__('general.care_of_infant_child'))
                                ->schema([
                                    Repeater::make('care_of_infant_child')
                                        ->label('')
                                        ->relationship('careOfInfantChildrens')
                                        ->schema([
                                            Select::make('skill_title')
                                                ->label('Skill')
                                                ->options(GeneralService::getInfantChildDropdown())
                                                ->native(false)
                                                ->disabled()
                                                ->dehydrated(),
                                            Toggle::make('willingness')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->default(true),
                                            Toggle::make('experience')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false),
                                        ])
                                        ->columns(3)
                                        ->columnSpanFull()
                                        ->defaultItems(6)
                                        ->afterStateHydrated(function (Get $get, Set $set, Component $component): bool {
                                            $records = $get('care_of_infant_child');
                                            $keys = collect($records)->keys();
                                            $i = 1;
                                            foreach ($keys as $key) {
                                                $set('care_of_infant_child.' . $key . '.skill_title', $i);
                                                $i++;
                                            }
                                            return true;
                                        })
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                ])->collapsible()->collapsed(),
                            Section::make(__('general.general_housework'))
                                ->schema([
                                    Repeater::make('general_housework')
                                        ->label('')
                                        ->relationship('generalHouseworks')
                                        ->schema([
                                            Select::make('work_title')
                                                ->label('Work')
                                                ->options(GeneralService::getGeneralHouseworkDropdown())
                                                ->native(false)
                                                ->disabled()
                                                ->dehydrated(),
                                            /*Toggle::make('willingness')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->default(true),*/
                                            Toggle::make('experience')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false),
                                        ])
                                        ->columns(3)
                                        ->columnSpanFull()
                                        ->defaultItems(5)
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                        ->afterStateHydrated(function (Get $get, Set $set, Component $component): bool {
                                            $records = $get('general_housework');
                                            $keys = collect($records)->keys();
                                            $i = 1;
                                            foreach ($keys as $key) {
                                                $set('general_housework.' . $key . '.work_title', $i);
                                                $i++;
                                            }
                                            return true;
                                        })
                                ])->collapsible()->collapsed(),
                            Section::make(__('general.care_of_pet'))
                                ->schema([
                                    Repeater::make('care_of_pet')
                                        ->label('')
                                        ->relationship('careOfPet')
                                        ->schema([
                                            Select::make('pet_title')
                                                ->label('Pet')
                                                ->options(GeneralService::getPet())
                                                ->native(false)
                                                ->disabled()
                                                ->dehydrated(),
                                            Toggle::make('willingness')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->default(true),
                                            Toggle::make('experience')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false),
                                        ])
                                        ->columns(3)
                                        ->columnSpanFull()
                                        ->defaultItems(2)
                                        ->addable(false)
                                        ->deletable(false)
                                        ->reorderable(false)
                                        ->afterStateHydrated(function (Get $get, Set $set, Component $component): bool {
                                            $records = $get('care_of_pet');
                                            $keys = collect($records)->keys();
                                            $i = 1;
                                            foreach ($keys as $key) {
                                                $set('care_of_pet.' . $key . '.pet_title', $i);
                                                $i++;
                                            }
                                            return true;
                                        })
                                ])->collapsible()->collapsed(),
                            Section::make(__('general.recommended_helper'))
                                ->relationship('bioDataDetail')
                                ->schema([
                                    CheckboxList::make('recommended_helper')
                                        ->label('')
                                        ->options(GeneralService::categoryForDropdown())->columns(3),
                                ])->columnSpanFull(),
                            Section::make(__('general.language_abilities'))
                                ->schema([
                                    Repeater::make('language_abilities')
                                        ->label('')
                                        ->relationship('languageAbilities')
                                        ->schema([
                                            Select::make('language_id')
                                                ->label(__('general.language'))
                                                ->options(GeneralService::languageForDropdown())
                                                ->searchable()
                                                ->native(false),
                                            TextInput::make('other')
                                                ->visible(fn(Get $get): bool => $get('language_id') == 9)
                                                ->required(fn(Get $get): bool => $get('language_id') == 9),
                                            Radio::make('rating')
                                                ->options([
                                                    1 => '1',
                                                    2 => '2',
                                                    3 => '3',
                                                    4 => '4',
                                                    5 => '5',
                                                ])
                                                ->inline(),
                                        ])
                                        ->columns(2)
                                        ->columnSpanFull()
                                        ->addActionLabel('Add Language')
                                ])->collapsible()->collapsed(),
                        ]),
                    Wizard\Step::make(__('general.employment_history_of_the_fdw'))
                        ->schema([
//                            Section::make(__('general.employment_history_overseas'))
//                                ->schema([
//                                    Repeater::make('employment_history_overseas')
//                                        ->relationship('overseasEmploymentHistories')
//                                        ->label('')
//                                        ->schema([
//                                            DatePicker::make('from_date')
//                                                ->label(__('general.date_from'))
//                                                ->native(false),
//                                            DatePicker::make('to_date')
//                                                ->label(__('general.date_to'))
//                                                ->native(false),
//                                            Select::make('country_id')
//                                                ->label(__('general.country_of_work'))
//                                                ->options(GeneralService::getCountries())
//                                                ->searchable()->native(false),
//                                            TextInput::make('employer'),
//                                            Textarea::make('work_duties'),
//                                            Textarea::make('remarks'),
//                                        ])->addActionLabel('Add History')
//                                        ->columns(6)
//                                        ->columnSpanFull()
//                                ]),
                            Section::make(__('general.employment_history_in_singapore'))
                                ->relationship('bioDataDetail')
                                ->description(__('general.employment_history_in_singapore_description'))
                                ->schema([
                                    Radio::make('previous_working_experience_in_singapore')
                                        ->boolean()
                                        ->inline(),
                                ]),
                            Section::make(__('general.feedback_from_previous_employers_in_singapore'))
                                ->relationship('bioDataDetail')
                                ->description(__('general.feedback_from_previous_employers_in_singapore_description'))
                                ->schema([
                                    Textarea::make('prev_employer_one_feedback')
                                        ->label(__('general.employer_one')),
                                    Textarea::make('prev_employer_two_feedback')
                                        ->label(__('general.employer_two')),
                                ])->columns(2),
                            Section::make(__('general.work_experience_with_employer'))
                                ->schema([
                                    Repeater::make('work_experience_with_employer')
                                        ->relationship('workExperienceWithEmployers')
                                        ->label('')
                                        ->schema([
                                            Checkbox::make('present')
                                                ->default(0)
                                                ->columnSpanFull(),
                                            TextInput::make('name_of_employer')
                                                ->live(),
                                            DatePicker::make('from_date')
                                                ->label(__('general.date_from'))
                                                ->native(false),
                                            DatePicker::make('to_date')
                                                ->label(__('general.date_to'))
                                                ->native(false)
                                                ->visible(fn(Get $get): bool => $get('present') == 0),
                                            Select::make('country_id')
                                                ->label(__('general.country_of_work'))
                                                ->options(GeneralService::countryForDropdown())
                                                ->searchable()->native(false),
                                            TextInput::make('other')
                                                ->label(__('general.other'))
                                                ->visible(fn(Get $get): bool => $get('country_id') == 15),
                                            TextInput::make('nationality')->label('Nationality/Race'),
                                            TextInput::make('language')->label('Language Used'),
                                            TextInput::make('type_of_house'),
                                            TextInput::make('members_in_family'),
                                            TextInput::make('salary')->label('Starting / Last Salary'),
                                            TextInput::make('age_of_children')->label('Age of Children / Elderly'),
                                            TextInput::make('off_days_given')->label("Off Day's Given"),
                                            Textarea::make('duties_detail'),
                                            Textarea::make('reason_for_leaving'),
                                        ])->collapsible()
                                        ->addActionLabel('Add Experience')
                                        ->itemLabel(fn(array $state): ?string => $state['name_of_employer'] ?? null)
                                        ->columns(4)->columnSpanFull()
                                ]),

                        ]),
                    Wizard\Step::make(__('general.other_details'))
                        ->schema([
                            Grid::make()
                                ->relationship('bioDataDetail')
                                ->schema([
                                    TextInput::make('basic_salary')
                                        ->suffixIcon('heroicon-s-currency-dollar'),
                                    Select::make('preference_for_rest_day')
                                        ->options(GeneralService::getPreferenceForRestDay())
                                        ->native(false),
                                    TextInput::make('special_mention'),
                                    TextArea::make('any_other_remarks')
                                        ->label(__('general.remarks_for_agent_only'))
                                        ->columnSpanFull(),
                                ]),
                            Grid::make()->relationship('bioDataDetail')
                                ->schema([
                                    CheckboxList::make('availability_of_fdw_for_interview')
                                        ->label(__('general.availability_of_fdw_to_be_interview'))
                                        ->options([
                                            'fdw_is_not_available' => 'MDW is not available for interview',
                                            'fdw_interviewed_by_phone' => 'MDW can be interviewed by phone',
                                            'fdw_interviewed_by_video' => 'MDW can be interviewed by video-conference',
                                            'fdw_interviewed_by_person' => 'MDW can be interviewed in person',
                                        ])->columns(2),
                                    Textarea::make('fdw_other_details')
                                        ->label('Other Details'),
                                ])->columns(1),
                            Grid::make()->relationship('bioDataDetail')->schema([
                                TextInput::make('fdw_name_signature')
                                    ->label(__('general.fdw_name_signature')),
                                DatePicker::make('fdw_date')
                                    ->label(__('general.date'))
                                    ->native(false),
                                TextInput::make('personnel_name_reg_no')
                                    ->label(__('general.personnel_name_reg_no')),
                                DatePicker::make('ea_personnel_date')
                                    ->label(__('general.date'))
                                    ->native(false),
                                Section::make('I have gone through the 4 page biodata of this MDW and confirm that I would like to employ her')
                                    ->schema([
                                        TextInput::make('employer_nric_no')
                                            ->label(__('general.employer_nric_no')),
                                        DatePicker::make('employer_date')
                                            ->label(__('general.date'))
                                            ->native(false),
                                    ])->columns(2),
                            ])->columns(2),
                            Section::make(__('general.referrer_details'))
                                ->description(__('general.referrer_details_description'))
                                ->relationship('referrerDetail')
                                ->schema([
                                    TextInput::make('full_name'),
                                    TextInput::make('nick_name'),
                                    Select::make('country_id')
                                        ->label(__('general.nationality'))
                                        ->options(GeneralService::getCountries())
                                        ->searchable()->native(false),
                                    TextInput::make('nric_no')
                                        ->label(__('general.nric_no')),
                                    TextInput::make('email_1')
                                        ->email(),
                                    TextInput::make('email_2')
                                        ->email(),
                                    TextInput::make('contact_1')
                                        ->numeric(),
                                    TextInput::make('contact_2')
                                        ->numeric(),
                                    TextInput::make('facebook_url')
                                        ->label(__('general.facebook_url'))
                                        ->placeholder('https://www.facebook.com/abcde…')
                                        ->url(),
                                ])->columns(2)
                                ->collapsible()
                                ->collapsed(),
                        ]),
                    Wizard\Step::make(__('general.attach_docs'))
                        ->schema([
                            Grid::make()
                                ->schema([
                                    FileUpload::make('photo')
                                        ->directory('fdw_bio_data_images/profile_picture')
                                        ->image()
                                        ->imageEditor(),
                                    FileUpload::make('certificates')
                                        ->directory('fdw_bio_data_images/certificates')
                                        ->image()
                                        ->imageEditor()
                                        ->multiple(),
                                    FileUpload::make('passport')
                                        ->directory('fdw_bio_data_images/passport')
                                        ->image()
                                        ->imageEditor()
                                        ->multiple(),
                                ])->columns(3),
                        ]),
                ])
                    ->columnSpanFull()
                    ->skippable()
                    ->submitAction(new HtmlString(Blade::render(<<<BLADE
                        <x-filament::button
                            type="submit"
                            size="sm"
                        >
                            Save and Preview
                        </x-filament::button>
                    BLADE)))
                    ->previousAction(fn(Action $action) => $action->label('Exit'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->state(static function (FdwBioData $record) {
                        if (isset($record->createdBy->supplier->prefix)){
                            return $record->createdBy->supplier->prefix.$record->id;
                        }
                        return $record->id;
                    })
                    ->label(__('general.ref_no')),
                Tables\Columns\ImageColumn::make('photo')
                    ->url(function (FdwBioData $record){
                        return route('website.bio-data.show',$record->id);
                    })
                    ->openUrlInNewTab()
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')->date(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => __("general.{$state}"))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'selected' => 'info',
                        'pending' => 'warning',
                        'published' => 'success',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'published' => 'heroicon-o-queue-list',
                        'pending' => 'heroicon-o-exclamation-triangle',
                        'selected' => 'heroicon-o-check-circle',
                    }),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->formatStateUsing(function (FdwBioData $record) {
                        return $record->createdBy->name . ' (' . Carbon::parse($record->created_at)->format('M d,Y') . ')';
                    }),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->formatStateUsing(function (FdwBioData $record) {
                        return $record->updatedBy->name . ' (' . Carbon::parse($record->updated_at)->format('M d,Y') . ')';
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => __('general.pending'),
                        'published' => __('general.published'),
                        'selected' => __('general.selected'),
                    ])
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('change_status')
                        ->label(__('general.change_status'))
                        ->icon('heroicon-o-arrow-path')
                        ->fillForm(fn(FdwBioData $record): array => [
                            'status' => $record->status,
                        ])
                        ->form([
                            Select::make('status')
                                ->options([
                                    'pending' => __('general.pending'),
                                    'published' => __('general.published'),
                                    'selected' => __('general.selected'),
                                ])
                                ->live()
                                ->native(false)
                                ->required(),
                            Select::make('employer_id')
                                ->label(__('general.employer'))
                                ->options(Employer::pluck('name', 'id'))
                                ->searchable()
                                ->native(false)
                                ->required(fn(Get $get): bool => $get('status') == 'selected')
                                ->visible(fn(Get $get): bool => $get('status') == 'selected'),
                            DatePicker::make('date')
                                ->native(false)
                                ->visible(fn(Get $get): bool => $get('status') == 'selected')
                                ->required(fn(Get $get): bool => $get('status') == 'selected')
                        ])
                        ->action(function (array $data, FdwBioData $record): void {
                            try {
                                if ($data['status'] == 'selected') {
                                    HiredFDW::create([
                                        'bio_data_id' => $record->id,
                                        'employer_id' => $data['employer_id'],
                                        'status' => 'process',
                                        'date' => $data['date'],
                                        'created_by' => auth()->id(),
                                    ]);
                                }
                                $record->status = $data['status'];
                                $record->updated_by = auth()->id();
                                $record->save();
                                FdwBioDataLog::create([
                                    'user_id' => auth()->id(),
                                    'fdw_record_id' => $record->id,
                                    'description' => 'Changed Record Status',
                                ]);
                                Notification::make()->title(__('general.success'))->success()->body(__('general.status_updated'))->send();
                            } catch (\Throwable $th) {
                                info($th->getMessage());
                            }

                        })->requiresConfirmation()
                        ->modalIcon('heroicon-o-exclamation-triangle')
                        ->color('warning')
                        ->visible(fn(FdwBioData $record): bool => $record->status != 'selected'),
                    Tables\Actions\ViewAction::make()
                        ->form(static::customRecordView())
                        ->fillForm(fn(FdwBioData $record): array => [
                            'contact_no_in_home_country' => $record->contact_no_in_home_country,
                            'contact_no_in_singapore_country' => $record->contact_no_in_singapore_country,
                            'facebook_url' => $record->facebook_url,
                            'ym_skype' => $record->ym_skype,
                            'email' => $record->email,
                            'others' => $record->other_contact,
                            'full_name' => $record->referrerDetail->full_name,
                            'nick_name' => $record->referrerDetail->nick_name,
                            'country_id' => $record->referrerDetail->country_id,
                            'nric_no' => $record->referrerDetail->nric_no,
                            'email_1' => $record->referrerDetail->email_1,
                            'email_2' => $record->referrerDetail->email_2,
                            'contact_1' => $record->referrerDetail->contact_1,
                            'contact_2' => $record->referrerDetail->contact_2,
                            'expected_salary' => $record->bioDataDetail->basic_salary,
                            'preference_for_rest_day' => $record->bioDataDetail->preference_for_rest_day,
                            'remarks_for_agent_only' => $record->bioDataDetail->any_other_remarks,
                        ])
                        ->disabledForm()
                        ->color('info'),
                    Tables\Actions\Action::make('View Log')
                        ->icon('heroicon-o-bars-3-bottom-left')
                        ->color('warning')
                        ->url(function (FdwBioData $record): string {
                            return route('filament.admin.resources.fdw-bio-datas.log', ['record' => $record->id]);
                        }),
                    Tables\Actions\Action::make('print')
                        ->label('Print')
                        ->icon('heroicon-o-printer')
                        ->color('success')
                        ->url(function (FdwBioData $record): string {
                            return route('filament.admin.resources.fdw-bio-datas.print', ['record' => $record->id]);
                        }),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Tables\Actions\DeleteAction::make()
                ])->label('Actions')
                    ->icon('heroicon-m-cog-8-tooth')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add MDW Bio Data'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFdwBioData::route('/'),
            'create' => Pages\CreateFdwBioData::route('/create'),
            'edit' => Pages\EditFdwBioData::route('/{record}/edit'),
            'print' => Pages\PrintFdwBioData::route('/{record}'),
            'log' => Pages\LogFdwBioData::route('/log/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(!(Filament::auth()->user()->hasRole([config('filament-shield.super_admin.name'),'Staff'])),function (Builder $query) {
            $query->where('created_by', Filament::auth()->user()->id);
        });
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::when(!(Filament::auth()->user()->hasRole([config('filament-shield.super_admin.name'), 'Staff'])),function (Builder $query) {
            $query->where('created_by', Filament::auth()->user()->id);
        })
            ->count();
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
            'print',
            'view_log',
            'publish',
        ];
    }

    public static function customRecordView()
    {
        return
            [
                Section::make(__('general.applicant_contact_info'))
                    ->schema([
                        TextInput::make('contact_no_in_home_country'),
                        TextInput::make('contact_no_in_singapore_country'),
                        TextInput::make('facebook_url'),
                        TextInput::make('ym_skype'),
                        TextInput::make('email'),
                        TextInput::make('others'),
                    ])->columns(3)->collapsible(),
                Section::make(__('general.referrer_details'))
                    ->schema([
                        TextInput::make('full_name'),
                        TextInput::make('nick_name'),
                        Select::make('country_id')
                            ->label(__('general.nationality'))
                            ->options(GeneralService::getCountries()),
                        TextInput::make('nric_no'),
                        TextInput::make('email_1'),
                        TextInput::make('email_2'),
                        TextInput::make('contact_1'),
                        TextInput::make('contact_2'),
                    ])->columns(3)->collapsible()->collapsed(),
                Section::make(__('general.other_information'))
                    ->schema([
                        TextInput::make('expected_salary'),
                        TextInput::make('preference_for_rest_day'),
                        Textarea::make('remarks_for_agent_only')->columnSpanFull()
                    ])->columns(2)->collapsible()->collapsed(),
            ];
    }
}
