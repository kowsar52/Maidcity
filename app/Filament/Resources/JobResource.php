<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use App\Services\GeneralService;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Laravel\Prompts\warning;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('general.job_detail'))
                    ->schema([
                        TextInput::make('job_title')->required(),
                        Forms\Components\RichEditor::make('job_description'),
                    ])->columns(1),
                Section::make(__('general.other_information'))
                    ->schema([
                        TextInput::make('salary_range')
                            ->label(__('general.salary_range'))
                            ->numeric()->suffixIcon('heroicon-o-currency-dollar'),
                        DatePicker::make('expected_start_date')
                            ->native(false),
                        Select::make('type_of_mdw')
                            ->label(__('general.type_of_mdw'))
                            ->options([
                                1 => 'New/Fresh MDWs',
                                2 => 'Experienced MDWs',
                                3 => 'Transfer MDWs',
                                4 => 'Caregivers',
                                5 => 'No Preference',
                            ])
                            ->multiple()
                            ->searchable()
                            ->native(false),
                        Select::make('nationality_preferred')
                            ->label(__('general.nationality_preferred'))
                            ->options([
                                1 => 'Indonesian',
                                2 => 'Myanmar',
                                3 => 'No Preference',
                                4 => 'Philippines',
                                5 => 'Mizoram',
                            ])
                            ->multiple()
                            ->searchable()
                            ->native(false),
                        Select::make('rest_day')
                            ->options(GeneralService::getPreferenceForRestDay())
                            ->searchable()
                            ->native(false),
                        Select::make('employer_requirement')
                            ->label(__('general.employer_requirement'))
                            ->options(GeneralService::categoryForDropdown())
                            ->multiple()
                            ->searchable()
                            ->native(false),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job_title')->searchable(),
                Tables\Columns\TextColumn::make('job_description')->limit(35)->html(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => __("general.{$state}"))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'enlisted' => 'info',
                        'mark_as_found' => 'success',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'enlisted' => 'heroicon-o-queue-list',
                        'mark_as_found' => 'heroicon-o-check-circle',
                    }),
                Tables\Columns\TextColumn::make('createdBy.name'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'enlisted' => __('general.enlisted'),
                    'mark_as_found' => __('general.mark_as_found'),
                ])->native(false),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('change_status')
                        ->label(__('general.change_status'))
                        ->icon('heroicon-o-arrow-path')
                        ->fillForm(fn(Job $record): array => [
                            'status' => $record->status,
                        ])
                        ->form([
                            Select::make('status')
                                ->options([
                                    'enlisted' => __('general.enlisted'),
                                    'mark_as_found' => __('general.mark_as_found'),
                                ])
                                ->native(false)
                                ->required(),
                        ])
                        ->action(function (array $data, Job $record): void {
                            $record->status = $data['status'];
                            $record->updated_by = auth()->id();
                            $record->save();
                        })->requiresConfirmation()
                        ->modalIcon('heroicon-o-exclamation-triangle')
                        ->color('warning'),
                    Tables\Actions\ViewAction::make()->color('info'),
                    Tables\Actions\EditAction::make()->color('warning'),
                    Tables\Actions\DeleteAction::make(),
                ])->label('Actions')
                    ->icon('heroicon-m-cog-8-tooth')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
