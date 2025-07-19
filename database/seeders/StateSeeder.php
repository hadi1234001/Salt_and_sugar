<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['state' => 'دمشق'],
            ['state' => 'حلب'],
            ['state' => 'حمص'],
            ['state' => 'حماه'],
            ['state' => 'اللاذقية'],
            ['state' => 'دير الزور'],
            ['state' => 'الحسكة'],
            ['state' => 'إدلب'],
            ['state' => 'السويداء'],
            ['state' => 'درعا'],
        ];

        DB::table('states')->insert($states);
    }
}
