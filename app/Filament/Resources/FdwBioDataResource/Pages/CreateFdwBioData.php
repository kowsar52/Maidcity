<?php

namespace App\Filament\Resources\FdwBioDataResource\Pages;

use App\Filament\Resources\FdwBioDataResource;
use App\Models\FdwBioDataLog;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateFdwBioData extends CreateRecord
{
    protected static string $resource = FdwBioDataResource::class;
    protected static ?string $title = 'Create MDW Bio Data';

    protected static array $myData = [];

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')->hidden();
    }

    protected static bool $canCreateAnother = false;

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')->hidden();
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = 'pending';
        $data['created_by'] = auth()->id();

        self::$myData = $data;

        return $data;
    }

    protected function afterCreate(): void
    {
        FdwBioDataLog::create([
            'user_id' => auth()->id(),
            'fdw_record_id' => $this->record['id'],
            'description' => 'Record Created',
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return url('admin/fdw-bio-datas/' . $this->record['id']);
    }
}
