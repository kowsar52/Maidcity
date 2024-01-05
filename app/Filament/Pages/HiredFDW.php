<?php

namespace App\Filament\Pages;

use App\Models\FdwBioData;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HiredFDW extends Page implements HasForms,HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static string $view = 'filament.pages.hired-f-d-w';

    protected static ?string $navigationGroup = 'MDW';
    protected static ?string $navigationLabel = 'Hired MDW';

    protected static ?string $title = 'Hired MDW';
    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_HiredFDW');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('page_HiredFDW'), 403);
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\HiredFDW::query())
            ->columns([
                TextColumn::make('employer.id')
                    ->label('Employer ID'),
                TextColumn::make('employer.name')
                    ->label('Employer')
                    ->searchable(),
                TextColumn::make('fdwBioData.id')
                    ->label('Ref #')
                    ->searchable(),
                TextColumn::make('fdwBioData.name')
                    ->label('Bio Data Name')
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('general.job_status'))
                    ->formatStateUsing(fn(string $state): string => __("general.{$state}"))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'process' => 'info',
                        'completed' => 'success',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'process' => 'heroicon-o-arrow-path',
                        'completed' => 'heroicon-o-check-circle',
                    }),
                TextColumn::make('created_at')->date(),
            ])
            ->actions([
                Action::make('action')
                    ->label(__('general.mark_job_as_completed'))
                    ->action(function (array $data, \App\Models\HiredFDW $record): void {
                        self::applyAssociation($record,$data);
                    })->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn(\App\Models\HiredFDW $record) => $record->status === 'process'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'process' => __('general.process'),
                        'completed' => __('general.completed'),
                    ])->native(false),
            ])
            ->emptyStateHeading('No Data Found');
    }

    private function applyAssociation($record,$data)
    {
        try {
            $record->update([
                'status' => 'completed',
            ]);
            $bioData = FdwBioData::find($record->bio_data_id);
            if(!$bioData)
            {
                Notification::make()->danger()->title(__('general.error'))->body('Bio Data Not Found')->send();
                return false;
            }
            $bioData->update([
                'status' => 'published',
            ]);

            Notification::make()->success()->title(__('general.success'))->body('Status Updated')->send();

            return true;
        } catch (\Throwable $th) {
            Notification::make()->danger()->title(__('general.error'))->body('Something went wrong')->send();
            return false;
        }
    }

    public static function getNavigationBadge(): ?string
    {
        return \App\Models\HiredFDW::count();
    }
}
