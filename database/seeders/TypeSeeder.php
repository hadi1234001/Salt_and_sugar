<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type' => 'مقبلات'],
            ['type' => 'أطباق رئيسية'],
            ['type' => 'حلويات'],
            ['type' => 'مشروبات'],
            ['type' => 'وجبات سريعة']
        ];

        DB::table('types')->insert($types);
    }
}
