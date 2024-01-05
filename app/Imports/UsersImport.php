<?php

namespace App\Imports;

use App\Enum\TableEnum;
use App\Models\Authorization\RoleUser;
use App\Models\Authorization\User;
use App\Models\Employer;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required','email',Rule::unique(TableEnum::USERS)],
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $model = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'email_verified_at' => Carbon::now(),
                'current_password' => $row['email'],
                'password' => Hash::make($row['email']),
            ]);
            if ($row['role'] === 'Employer') {
                RoleUser::create([
                    'role_id' => 4,
                    'user_id' => $model->id
                ]);
                Employer::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'contact_number' => $row['contact_number'],
                    'whatsapp_number' => $row['whatapp_number'],
                    'address' => $row['address'],
                    'user_id' => $model->id,
                ]);
            }
            if ($row['role'] === 'Staff') {
                RoleUser::create([
                    'role_id' => 3,
                    'user_id' => $model->id
                ]);
                Staff::create([
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'contact_number' => $row['contact_number'],
                    'whatsapp_number' => $row['whatapp_number'],
                    'address' => $row['address'],
                    'user_id' => $model->id,
                ]);
            }
        }
    }

    public function batchSize(): int
    {
        return 301;
    }

    public function chunkSize(): int
    {
        return 301;
    }
}
