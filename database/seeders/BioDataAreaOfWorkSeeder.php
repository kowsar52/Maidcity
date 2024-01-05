<?php

namespace Database\Seeders;

use App\Enum\TableEnum;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BioDataAreaOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table(TableEnum::BIO_DATA_AREA_OF_WORKS)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table(TableEnum::BIO_DATA_AREA_OF_WORKS)->insert([
            [
                'name' => 'Care of Infant/Children',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Care of Elderly',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Care of Disable',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'General Housework',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'Cooking',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
