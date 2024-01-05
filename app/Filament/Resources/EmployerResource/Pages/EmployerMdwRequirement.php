<?php

namespace App\Filament\Resources\EmployerResource\Pages;

use App\Filament\Resources\EmployerResource;
use Filament\Resources\Pages\Page;

class EmployerMdwRequirement extends Page
{
    public $record;
    protected static string $resource = EmployerResource::class;

    protected static string $view = 'filament.resources.employer-resource.pages.employer-mdw-requirement';

    protected static ?string $title = 'Employer Mdw Requirement';

    public function mount($user_id)
    {
        $this->record = \App\Models\EmployerMDWRequirement::with('user')
            ->where('user_id', $user_id)
            ->first();
    }
}
