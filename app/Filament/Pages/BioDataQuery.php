<?php

namespace App\Filament\Pages;

use App\Models\FdwBioData;
use App\Models\FDWBioDataContactUsEmployer;
use App\Models\HiredFDW;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class BioDataQuery extends Page implements HasForms,HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.bio-data-query';

    protected static ?string $navigationLabel = 'MDW Bio Data Query';

    protected static ?string $title = 'MDW Bio Data Query';

    protected static ?int $navigationSort = 8;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_BioDataQuery');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('page_BioDataQuery'), 403);
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(FDWBioDataContactUsEmployer::query())
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
                TextColumn::make('message'),
                TextColumn::make('branch_enquiry')
                    ->formatStateUsing(fn(string $state): string => $state),
                TextColumn::make('status')
                    ->formatStateUsing(fn(string $state): string => __("general.{$state}"))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        'approved' => 'success',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'rejected' => 'heroicon-o-x-mark',
                        'pending' => 'heroicon-o-exclamation-triangle',
                        'approved' => 'heroicon-o-check-circle',
                    }),
                TextColumn::make('created_at')->date(),
            ])
            ->actions([
                Action::make('action')
                    ->form([
                        Select::make('status')
                            ->options([
                                'approved' => __('general.approved'),
                                'rejected' => __('general.rejected'),
                            ])
                            ->native(false)
                            ->required(),
                    ])
                    ->action(function (array $data, FDWBioDataContactUsEmployer $record): void {
                        if ($data['status'] === 'rejected')
                        {
                            $record->update([
                                'status' => $data['status'],
                            ]);
                            return;
                        }
                        self::applyAssociation($record,$data);
                    })->requiresConfirmation()
                    ->modalIcon('heroicon-o-exclamation-triangle')
                    ->modalHeading('Status')
                    ->color('primary')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->button()
                    ->visible(fn(FDWBioDataContactUsEmployer $record) => $record->status === 'pending'),
            ])
            ->emptyStateHeading('No Query Found');
    }

    private function applyAssociation($record,$data)
    {
        try {
            $record->update([
                'status' => $data['status'],
            ]);
            $bioData = FdwBioData::find($record->fdw_bio_data_id);
            if(!$bioData)
            {
                Notification::make()->danger()->title('Bio Data Not Found')->send();
                return false;
            }
            $bioData->update([
                'status' => 'selected',
            ]);
            $hiredFDW = HiredFDW::create([
                'bio_data_id' => $bioData->id,
                'employer_id' => $record->employer_id,
                'status' => 'process',
            ]);
            if($hiredFDW) {
                Notification::make()->success()->title(__('general.success'))->body('Status Updated')->send();
            } else {
                Notification::make()->danger()->title(__('general.error'))->body('Bio Data Not Found')->send();
            }
            return true;
        } catch (\Throwable $th) {
            Notification::make()->danger()->title(__('general.error'))->body('Something went wrong')->send();
            return false;
        }
    }
}
