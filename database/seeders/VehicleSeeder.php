<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            ['vehicle' => 'دراجة هوائية'],
            ['vehicle' => 'دراجة نارية'],
            ['vehicle' => 'دراجة كهربائية'],
            ['vehicle' => 'سيارة خاصة'],
            ['vehicle' => 'تاكسي'],
            ['vehicle' => 'فان'],
            ['vehicle' => 'شاحنة صغيرة']
        ];

        DB::table('vehicles')->insert($vehicles);
    }
}
