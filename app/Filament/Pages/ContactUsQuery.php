<?php

namespace App\Filament\Pages;

use App\Models\ContactUs;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ContactUsQuery extends Page implements HasForms,HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static string $view = 'filament.pages.contact-us-query';
    protected static ?int $navigationSort = 6;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_ContactUsQuery');
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->can('page_ContactUsQuery'), 403);
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(ContactUs::query())
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('subject'),
                TextColumn::make('message'),
                TextColumn::make('branch')
                    ->formatStateUsing(fn(string $state): string => __("general.{$state}")),
                TextColumn::make('created_at')->date(),
            ])
            ->emptyStateHeading('No Query Found');
    }
}
