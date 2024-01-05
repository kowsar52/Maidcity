<?php

namespace Database\Seeders;

use Database\Seeders\Authorization\RoleUserSeeder;
use Database\Seeders\Authorization\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ShieldSeeder::class);
        $this->call(BioDataAreaOfWorkSeeder::class);
    }
}
