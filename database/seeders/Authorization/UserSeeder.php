<?php

namespace Database\Seeders\Authorization;

use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TableEnum::USERS)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table(TableEnum::USERS)->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'current_password' => 'admin123',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin123'),
                'active' => true,
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
