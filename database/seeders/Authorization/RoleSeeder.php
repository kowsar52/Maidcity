<?php

namespace Database\Seeders\Authorization;

use App\Enum\RoleEnum;
use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TableEnum::ROLES)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach (RoleEnum::getTranslationKeys() as $key => $value) {
            DB::table(TableEnum::ROLES)->insert([
                [
                    'name' => $value,
                    'label' => $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]);
        }
    }
}
