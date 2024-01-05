<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('prefix')
                            ->unique()
                            ->required(),
                        Forms\Components\TextInput::make('company_name')
                            ->required(),
                        Forms\Components\TextInput::make('person_1')
                            ->required(),
                        Forms\Components\TextInput::make('email_1')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\TextInput::make('phone_number_1')
                            ->required(),
                        Forms\Components\TextInput::make('person_2'),
                        Forms\Components\TextInput::make('email_2')
                            ->email()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('phone_number_2'),
                        Forms\Components\Textarea::make('other_information'),
                        Forms\Components\FileUpload::make('photo')
                            ->directory('suppliers/photos')
                            ->image()
                            ->imageEditor(),
                        Forms\Components\Textarea::make('full_address')
                            ->rows(3)
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('prefix')->searchable(),
                Tables\Columns\TextColumn::make('company_name')->searchable(),
                Tables\Columns\TextColumn::make('person_1')->searchable(),
                Tables\Columns\TextColumn::make('email_1')->searchable(),
                Tables\Columns\TextColumn::make('phone_number_1')->searchable(),
                Tables\Columns\TextColumn::make('person_2')->searchable(),
                Tables\Columns\TextColumn::make('email_2')->searchable(),
                Tables\Columns\TextColumn::make('phone_number_2')->searchable(),
                Tables\Columns\TextColumn::make('full_address')->searchable(),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->formatStateUsing(function (Supplier $record) {
                        return $record->createdBy->name . ' (' . Carbon::parse($record->created_at)->format('M d,Y') . ')';
                    }),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->formatStateUsing(function (Supplier $record) {
                        return $record->updatedBy->name . ' (' . Carbon::parse($record->updated_at)->format('M d,Y') . ')';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()->color('warning'),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
