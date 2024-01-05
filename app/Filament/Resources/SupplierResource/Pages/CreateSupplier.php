<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use App\Filament\Resources\SupplierResource;
use App\Models\Authorization\RoleUser;
use App\Models\Authorization\User;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateSupplier extends CreateRecord
{
    protected static string $resource = SupplierResource::class;

    protected function getCreateFormAction(): Action
    {
        return Action::make('save')->submit('create');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::firstOrCreate(
            [
                'email' => $data['email_1']
            ],
            [
                'photo' => $data['photo'],
                'name' => $data['person_1'],
                'email' => $data['email_1'],
                'email_verified_at' => Carbon::now(),
                'current_password' => $data['phone_number_1'],
                'password' => Hash::make($data['phone_number_1']),
                'status' => 'active',
                'created_by' => auth()->id(),
            ]
        );
        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => 2 // Supplier ID
        ]);

        $data['user_id'] = $user->id;
        $data['created_by'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return self::getResource()::getUrl('index');
    }
}
