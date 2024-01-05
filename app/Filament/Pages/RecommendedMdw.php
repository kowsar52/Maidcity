<?php

namespace App\Filament\Pages;

use App\Services\FdwBioDataService;
use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class RecommendedMdw extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationGroup = 'MDW';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.recommended-mdw';

    public ?array $data = [];

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_RecommendedMdw');
    }

    public function mount(\App\Models\SiteSetting $setting){
        abort_unless(auth()->user()->can('page_RecommendedMdw'), 403);
        $recommended_mdw = $setting->where('label', 'recommended_mdw')->first();
        $this->form->fill([
            'recommended_mdw' => $recommended_mdw->items ?? null,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make(__('general.recommended_mdw'))
                ->schema([
                    CheckboxList::make('recommended_mdw')
                        ->label('')
                        ->options(FdwBioDataService::getFdwBioDataForDropdown())
                        ->columns(7)
                ]),
        ])->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label(__('general.save'))
                ->submit('save')
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $request = [
            'recommended_mdw' => $state['recommended_mdw'],
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
