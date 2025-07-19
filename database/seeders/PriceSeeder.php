<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            // أسعار لطبق كبة نيّة
            ['plate_id' => 1, 'person_number' => 2, 'price' => 3000.00, 'discount' => 200],
            ['plate_id' => 1, 'person_number' => 4, 'price' => 5500.00, 'discount' => 300],
            ['plate_id' => 1, 'person_number' => 6, 'price' => 8000.00, 'discount' => 500],

            // أسعار لطبق شاورما دجاج
            ['plate_id' => 2, 'person_number' => 1, 'price' => 1200.00, 'discount' => 100],
            ['plate_id' => 2, 'person_number' => 2, 'price' => 2300.00, 'discount' => 200],
            ['plate_id' => 2, 'person_number' => 4, 'price' => 4500.00, 'discount' => 300],

            // أسعار لطبق فتة حمص
            ['plate_id' => 3, 'person_number' => 2, 'price' => 2500.00, 'discount' => 200],
            ['plate_id' => 3, 'person_number' => 4, 'price' => 4800.00, 'discount' => 300],
            ['plate_id' => 3, 'person_number' => 6, 'price' => 7000.00, 'discount' => 500],

            // أسعار لطبق معمول
            ['plate_id' => 4, 'person_number' => 1, 'price' => 800.00, 'discount' => 50],
            ['plate_id' => 4, 'person_number' => 2, 'price' => 1500.00, 'discount' => 100],
            ['plate_id' => 4, 'person_number' => 4, 'price' => 2800.00, 'discount' => 200],

            // أسعار لطبق سمك مشوي
            ['plate_id' => 5, 'person_number' => 2, 'price' => 4000.00, 'discount' => 300],
            ['plate_id' => 5, 'person_number' => 4, 'price' => 7500.00, 'discount' => 500],
            ['plate_id' => 5, 'person_number' => 6, 'price' => 10000.00, 'discount' => 700],
        ];

        DB::table('prices')->insert($prices);
    }
}
