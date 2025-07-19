<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plates = [
            [
                'plate_name' => 'كبة نيّة',
                'description' => 'طبق كبة نيّة طازجة ومميزة من الشيف أحمد السعيد.',
                'photo_path' => 'plates/kibbeh.jpg',
                'chef_id' => 1,
                'sub_type_id' => 1,
            ],
            [
                'plate_name' => 'شاورما دجاج',
                'description' => 'شاورما دجاج منزلية مع صلصة خاصة.',
                'photo_path' => 'plates/shawerma.jpg',
                'chef_id' => 2,
                'sub_type_id' => 5,
            ],
            [
                'plate_name' => 'فتة حمص',
                'description' => 'فتة حمص باللبن مع كمون مميز.',
                'photo_path' => 'plates/fattahomos.jpg',
                'chef_id' => 3,
                'sub_type_id' => 2,
            ],
            [
                'plate_name' => 'حلوى المعمول',
                'description' => 'معمول محشي بالجوز والتمر من الشيف عمر الحلبي.',
                'photo_path' => 'plates/mamoul.jpg',
                'chef_id' => 3,
                'sub_type_id' => 7,
            ],
            [
                'plate_name' => 'سمك مشوي',
                'description' => 'سمك طازج مشوي بطريقة مميزة.',
                'photo_path' => 'plates/grilled-fish.jpg',
                'chef_id' => 2,
                'sub_type_id' => 6,
            ]
        ];

        DB::table('plates')->insert($plates);
    }
}
