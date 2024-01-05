<?php

namespace App\Filament\Resources\FdwBioDataResource\Pages;

use App\Filament\Resources\FdwBioDataResource;
use App\Models\FdwBioDataLog;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditFdwBioData extends EditRecord
{
    protected static string $resource = FdwBioDataResource::class;
    protected static ?string $title = "Edit MDW Bio Data";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save changes')->hidden();
    }

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();

        return $data;
    }

    protected function afterSave(): void
    {
        FdwBioDataLog::create([
            'user_id' => auth()->id(),
            'fdw_record_id' => $this->record['id'],
            'description' => 'Record Updated',
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return url('admin/fdw-bio-datas/' . $this->record['id']);
    }
}
