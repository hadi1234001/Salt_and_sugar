<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            ['ingredients' => 'زيت زيتون'],
            ['ingredients' => 'ثوم'],
            ['ingredients' => 'بصل'],
            ['ingredients' => 'فلفل أسود'],
            ['ingredients' => 'كمون'],
            ['ingredients' => 'زعتر'],
            ['ingredients' => 'دجاج'],
            ['ingredients' => 'لحم'],
            ['ingredients' => 'سمك'],
            ['ingredients' => 'جمبو'],
            ['ingredients' => 'بيض'],
            ['ingredients' => 'لبن'],
            ['ingredients' => 'خيار'],
            ['ingredients' => 'خبز عربي'],
            ['ingredients' => 'طماطم'],
            ['ingredients' => 'بقدونس'],
            ['ingredients' => 'زعتر'],
            ['ingredients' => 'جوز'],
            ['ingredients' => 'تمر'],
            ['ingredients' => 'قرفة']
        ];

        DB::table('ingredients')->insert($ingredients);
    }
}
