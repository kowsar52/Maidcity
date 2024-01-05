<?php

namespace App\Filament\Resources\FdwBioDataResource\Pages;

use App\Filament\Resources\FdwBioDataResource;
use App\Models\FdwBioDataLog;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class LogFdwBioData extends Page implements HasTable
{
    public $record;

    use InteractsWithTable;

    protected static string $resource = FdwBioDataResource::class;

    protected static string $view = 'filament.resources.fdw-bio-data-resource.pages.log-fdw-bio-data';

    protected static ?string $title = 'MDW Bio Data Log';

    public function mount(): void
    {
        abort_unless(auth()->user()->can('view_log_fdw::bio::data'), 403);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(FdwBioDataLog::where('fdw_record_id', $this->record))
            ->columns([
                TextColumn::make('description')
                    ->label('Description'),
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                TextColumn::make('created_at')
                ->dateTime(),
            ]);
    }

}
