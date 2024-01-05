<?php

namespace App\Filament\Pages;

use App\Models\FdwBioData;
use App\Services\FdwBioDataService;
use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class SiteSetting extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationGroup = 'Website Management';
    protected static ?string $navigationLabel = 'Site Settings';

    protected static string $view = 'filament.pages.site-setting';

    public ?array $data = [];

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_SiteSetting');
    }

    public function mount(\App\Models\SiteSetting $setting): void
    {
        abort_unless(auth()->user()->can('page_SiteSetting'), 403);

        $slider_title = $setting->where('label', 'slider_title')->first();
        $license_no = $setting->where('label', 'license_no')->first();
        $sliders = $setting->where('label', 'sliders')->first();
        $contactDetails = $setting->where('label', 'contact_details')->first();
        $employeReviews = $setting->where('label', 'employer_reviews')->first();
        $aps_image1 = $setting->where('label', 'aps_image1')->first();
        $aps_image2 = $setting->where('label', 'aps_image2')->first();
        $aps_description = $setting->where('label', 'aps_description')->first();
        $aps_list = $setting->where('label', 'aps_list')->first();
        $our_services_heading = $setting->where('label', 'our_services_heading')->first();
        $about_us = $setting->where('label', 'about_us')->first();
        $this->form->fill([
            'slider_title' => $slider_title->items ?? null,
            'license_no' => $license_no->items ?? null,
            'sliders' => $sliders->items ?? null,
            'contact_details' => $contactDetails->items ?? null,
            'employer_reviews' => $employeReviews->items ?? null,
            'aps_image1' => $aps_image1->items ?? null,
            'aps_image2' => $aps_image2->items ?? null,
            'aps_description' => $aps_description->items ?? null,
            'aps_list' => $aps_list->items ?? null,
            'our_services_heading' => $our_services_heading->items ?? null,
            'about_us' => $about_us->items ?? null,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Label')
                    ->tabs([
                        Tabs\Tab::make(__('general.slider_title'))
                            ->schema([
                                TextInput::make('slider_title')
                                    ->label(__('general.title')),
                                TextInput::make('license_no'),
                                FileUpload::make('sliders')
                                    ->label('')
                                    ->image()
                                    ->imageEditor()
                                    ->multiple()
                                    ->directory('website/slider'),
                            ])->icon('heroicon-o-rectangle-stack'),
                        Tabs\Tab::make(__('general.contact_us_detail'))
                            ->schema([
                                Repeater::make('contact_details')
                                    ->schema([
                                        TextInput::make('branch_title')->label('Branch Title'),
                                        Textarea::make('address'),
                                        TextInput::make('contact_1')->numeric(),
                                        TextInput::make('contact_2')->numeric(),
                                        TextInput::make('email')->email(),
                                    ])->columns(5)
                                    ->label('')
                                    ->addActionLabel('Add Details'),
                            ])->icon('heroicon-o-chat-bubble-left-right'),
                        Tabs\Tab::make(__('general.employer_reviews'))
                            ->schema([
                                Repeater::make('employer_reviews')
                                    ->schema([
                                        Textarea::make('review_description')->label('Review Description'),
                                        TextInput::make('employer_name'),
                                        DatePicker::make('date')->native(false),
                                    ])->columns(3)
                                    ->label('')
                                    ->addActionLabel('Add Review'),
                            ])->icon('heroicon-o-chat-bubble-bottom-center-text'),
                        Tabs\Tab::make(__('general.advance_placement_scheme'))
                            ->schema([
                                FileUpload::make('aps_image1')
                                    ->label('Image1')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('website/advance_placement_scheme'),
                                FileUpload::make('aps_image2')
                                    ->label('Image2')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('website/advance_placement_scheme'),
                                Textarea::make('aps_description')
                                ->label('Description'),
                                Repeater::make('aps_list')
                                    ->label('list')
                                ->schema([
                                    TextInput::make('list')
                                    ->label(''),
                                ])
                                ->defaultItems(1),
                            ])->columns(3)->icon('heroicon-o-photo'),
                        Tabs\Tab::make(__('general.our_services'))
                            ->schema([
                                Textarea::make('our_services_heading')
                                    ->label('Heading'),
                            ])->columns(1)->icon('heroicon-o-clipboard-document-list'),
                        Tabs\Tab::make(__('general.about_us'))
                            ->schema([
                               RichEditor::make('about_us')
                                    ->label(''),
                            ])->columns(1)->icon('heroicon-o-queue-list'),
                    ])
            ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label(__('general.save_setting'))
                ->submit('saveSetting')
        ];
    }

    public function saveSetting(): void
    {
        $state = $this->form->getState();
        $request = [
            'slider_title' => $state['slider_title'],
            'license_no' => $state['license_no'],
            'sliders' => $state['sliders'],
            'contact_details' => $state['contact_details'],
            'employer_reviews' => $state['employer_reviews'],
            'aps_image1' => $state['aps_image1'],
            'aps_image2' => $state['aps_image2'],
            'aps_description' => $state['aps_description'],
            'aps_list' => $state['aps_list'],
            'our_services_heading' => $state['our_services_heading'],
            'about_us' => $state['about_us'],
        ];
        try {
            foreach($request as $key => $value)
            {
                \App\Models\SiteSetting::updateOrCreate(
                    [
                        'label' => $key
                    ],
                    [
                        'label' => $key,
                        'items' => $value
                    ]);
            }

        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
