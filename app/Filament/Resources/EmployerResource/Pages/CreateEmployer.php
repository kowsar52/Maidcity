<?php

namespace App\Filament\Resources\EmployerResource\Pages;

use App\Filament\Resources\EmployerResource;
use App\Models\Authorization\RoleUser;
use App\Models\Authorization\User;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployer extends CreateRecord
{
    protected static string $resource = EmployerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
                'photo' => $data['photo'],
                'name' => $data['name'],
                'email' => $data['email'],
                'email_verified_at' => Carbon::now(),
                'current_password' => $data['contact_number'],
                'password' => $data['contact_number'],
                'created_by' => auth()->id(),
            ]);
        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 6 // Employer Role ID
        ]);
        $data['user_id'] = $user->id;
        $data['created_by'] = auth()->id();

        return $data;
    }
}
