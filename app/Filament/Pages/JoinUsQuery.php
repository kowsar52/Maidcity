<?php

namespace App\Filament\Pages;

use App\Models\JoinUs;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class JoinUsQuery extends Page implements HasForms,HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.join-us-query';
    protected static ?int $navigationSort = 9;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_JoinUsQuery');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('page_JoinUsQuery'), 403);
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(JoinUs::query())
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('message')->limit(50),
                IconColumn::make('file')
                    ->color('primary')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn(JoinUs $record) => Storage::url($record->file))
                    ->openUrlInNewTab()
                    ->label(__('general.document')),
                TextColumn::make('created_at')->date(),
            ])
            ->emptyStateHeading('No Query Found');
    }
}
