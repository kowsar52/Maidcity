<?php

namespace App\Filament\Pages;

use App\Models\JobApply;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class JobQuery extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.job-query';

    protected static ?int $navigationSort = 10;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_JobQuery');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('page_JoinUsQuery'), 403);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(JobApply::query())
            ->columns([
                TextColumn::make('job.job_title')->searchable(),
                TextColumn::make('full_name')->searchable(),
                TextColumn::make('nationality')->searchable(),
                TextColumn::make('date_of_birth')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('contact_number')->searchable(),
                TextColumn::make('alternative_contact_number')->searchable(),
                TextColumn::make('whatsapp')->searchable(),
                TextColumn::make('facebook_messenger_url')->searchable(),
                TextColumn::make('created_at')->date(),
            ])
            ->emptyStateHeading('No Query Found');
    }
}
