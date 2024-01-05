<?php

namespace App\Filament\Resources\FdwBioDataResource\Pages;

use App\Filament\Resources\FdwBioDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListFdwBioData extends ListRecords
{
    protected static string $resource = FdwBioDataResource::class;

    protected static ?string $title = 'MDW Biodata';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('general.add_fdw_bio_data')),
        ];
    }
}
