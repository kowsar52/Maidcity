<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Authorization\User;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Authentication';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn('create'),
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->required()
                    ->multiple()
                    ->preload()
                    ->searchable(),
                Forms\Components\FileUpload::make('photo')
                    ->directory('users/photos'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->circular()
                    ->getStateUsing(fn ($record) => Filament::getUserAvatarUrl($record)),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('current_password')
                    ->label(__('general.password'))->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->badge(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->formatStateUsing(function (User $record) {
                        return $record->createdBy->name . ' (' . Carbon::parse($record->created_at)->format('M d,Y') . ')';
                    }),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->formatStateUsing(function (User $record) {
                        return $record->updatedBy->name . ' (' . Carbon::parse($record->updated_at)->format('M d,Y') . ')';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('change_status')
                        ->label(__('general.change_status'))
                        ->icon('heroicon-o-arrow-path')
                        ->fillForm(fn(User $record): array => [
                            'active' => $record->active,
                        ])
                        ->form([
                            Select::make('active')
                                ->options([
                                    0 => __('general.disable'),
                                    1 => __('general.active'),
                                ])
                                ->native(false)
                                ->required(),
                        ])
                        ->action(function (array $data, User $record): void {
                            $record->active = $data['active'];
                            $record->updated_by = auth()->id();
                            $record->save();
                        })->requiresConfirmation()
                        ->modalIcon('heroicon-o-arrow-path')
                        ->color('warning')
                        ->hidden(function (User $record) {
                            return ($record->email == 'superadmin@gmail.com');
                        }),
                    Tables\Actions\Action::make('change_password')
                        ->label(__('general.change_password'))
                        ->icon('heroicon-o-lock-closed')
                        ->form([
                            Forms\Components\TextInput::make('password')
                                ->password()
                                ->required(),
                        ])
                        ->action(function (array $data, User $record): void {
                            $record->password = $data['password'];
                            $record->updated_by = auth()->id();
                            $record->save();
                        })->requiresConfirmation()
                        ->modalIcon('heroicon-o-lock-closed')
                        ->color('info'),
                    Tables\Actions\EditAction::make()
                        ->hidden(function (User $record) {
                            return ($record->email == 'superadmin@gmail.com');
                        })->color('warning'),
                    Tables\Actions\DeleteAction::make()
                        ->hidden(function (User $record) {
                            return ($record->email == 'superadmin@gmail.com');
                        }),
                    Tables\Actions\RestoreAction::make(),
                ])->label('Actions')
                    ->icon('heroicon-m-cog-8-tooth')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button(),

            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
