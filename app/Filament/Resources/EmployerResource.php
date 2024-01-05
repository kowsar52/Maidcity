<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployerResource\Pages;
use App\Filament\Resources\EmployerResource\RelationManagers;
use App\Models\Employer;
use App\Models\EmployerMDWRequirement;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email(),
                        Forms\Components\TextInput::make('contact_number')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('whatsapp_number')
                            ->numeric(),
                        Forms\Components\Textarea::make('address'),
                        Forms\Components\FileUpload::make('photo')
                            ->directory('employer/photos')
                            ->image()
                            ->imageEditor()
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\ImageColumn::make('photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('general.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('general.email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number'),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->formatStateUsing(function (Employer $record) {
                        return $record->createdBy->name . ' (' . Carbon::parse($record->created_at)->format('M d,Y') . ')';
                    }),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->formatStateUsing(function (Employer $record) {
                        return $record->updatedBy->name . ' (' . Carbon::parse($record->updated_at)->format('M d,Y') . ')';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('View Mdw Requirement')
                        ->icon('heroicon-o-bars-3-bottom-left')
                        ->color('warning')
                        ->url(function(Employer $record): string {
                            return route('filament.admin.resources.employers.employer-mdw-requirement', ['user_id' => $record->user_id]);
                        }),
                    Tables\Actions\ViewAction::make()
                        ->color('info'),
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
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
            'index' => Pages\ListEmployers::route('/'),
            'create' => Pages\CreateEmployer::route('/create'),
            'edit' => Pages\EditEmployer::route('/{record}/edit'),
            'employer-mdw-requirement' => Pages\EmployerMdwRequirement::route('/{user_id}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
