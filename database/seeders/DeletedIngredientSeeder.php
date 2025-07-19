<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeletedIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deletedIngredients = [
            // في الطلب 1: العميل لا يريد الثوم
            ['ingredients_id' => 2, 'order_id' => 1], // الثوم
            ['ingredients_id' => 6, 'order_id' => 1], // الزعتر

            // في الطلب 2: بدون فلفل أسود
            ['ingredients_id' => 4, 'order_id' => 2], // فلفل أسود

            // في الطلب 5: بدون بيض
            ['ingredients_id' => 11, 'order_id' => 5], // بيض
        ];

        DB::table('deleted_ingredients')->insert($deletedIngredients);
    }
}
