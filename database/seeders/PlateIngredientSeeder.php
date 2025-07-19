<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlateIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plateIngredients = [
            // كبة نيّة - plate_id = 1
            ['plate_id' => 1, 'ingredients_id' => 1], // زيتون
            ['plate_id' => 1, 'ingredients_id' => 2], // ثوم
            ['plate_id' => 1, 'ingredients_id' => 3], // بصل
            ['plate_id' => 1, 'ingredients_id' => 4], // فلفل أسود

            // شاورما دجاج - plate_id = 2
            ['plate_id' => 2, 'ingredients_id' => 1], // زيتون
            ['plate_id' => 2, 'ingredients_id' => 6], // زعتر
            ['plate_id' => 2, 'ingredients_id' => 7], // دجاج
            ['plate_id' => 2, 'ingredients_id' => 9], // سمك ← يمكنك تعديله لاحقاً حسب الطبق

            // فتة حمص - plate_id = 3
            ['plate_id' => 3, 'ingredients_id' => 10], // جمبو
            ['plate_id' => 3, 'ingredients_id' => 11], // بيض
            ['plate_id' => 3, 'ingredients_id' => 12], // لبن
            ['plate_id' => 3, 'ingredients_id' => 13], // خيار

            // حلويات معمول - plate_id = 4
            ['plate_id' => 4, 'ingredients_id' => 18], // جوز
            ['plate_id' => 4, 'ingredients_id' => 19], // تمر
            ['plate_id' => 4, 'ingredients_id' => 20], // قرفة

            // سمك مشوي - plate_id = 5
            ['plate_id' => 5, 'ingredients_id' => 9],  // سمك
            ['plate_id' => 5, 'ingredients_id' => 3],  // بصل
            ['plate_id' => 5, 'ingredients_id' => 4],  // فلفل أسود
            ['plate_id' => 5, 'ingredients_id' => 6],  // زعتر
        ];

        DB::table('plate_ingredients')->insert($plateIngredients);
    }
}
