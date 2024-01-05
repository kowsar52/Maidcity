<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use App\Models\Authorization\RoleUser;
use App\Models\Authorization\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'photo' => $data['photo'],
            'name' => $data['name'],
            'email' => $data['email'],
            'current_password' => $data['contact_number'],
            'password' => $data['contact_number'],
            'created_by' => auth()->id(),
        ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 3 // Staff Role ID
        ]);

        $data['user_id'] = $user->id;
        $data['created_by'] = auth()->id();

        return $data;
    }
}
