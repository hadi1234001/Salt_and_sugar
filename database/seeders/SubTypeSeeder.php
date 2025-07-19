<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subTypes = [
            ['sub_type' => 'سلطات', 'type_id' => 1],
            ['sub_type' => 'معجنات', 'type_id' => 1],
            ['sub_type' => 'سناك', 'type_id' => 1],

            ['sub_type' => 'دجاج', 'type_id' => 2],
            ['sub_type' => 'لحم', 'type_id' => 2],
            ['sub_type' => 'سمك', 'type_id' => 2],

            ['sub_type' => 'شرقية', 'type_id' => 3],
            ['sub_type' => 'غربية', 'type_id' => 3],

            ['sub_type' => 'ساخنة', 'type_id' => 4],
            ['sub_type' => 'باردة', 'type_id' => 4],

            ['sub_type' => 'برجر', 'type_id' => 5],
            ['sub_type' => 'بيتزا', 'type_id' => 5],
            ['sub_type' => 'ساندويشات', 'type_id' => 5],
        ];

        DB::table('sub_types')->insert($subTypes);
    }
}
