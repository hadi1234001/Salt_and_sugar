<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chefs = [
            [
                'user_name' => 'chef_ahmad',
                'first_name' => 'أحمد',
                'second_name' => 'محمد',
                'last_name' => 'السعيد',
                'email' => 'chef_ahmad@example.com',
                'password' => Hash::make('password'),
                'mobile_number' => '0998877665',
                'birth_date' => '1990-05-15',
                'overview' => 'شيف متخصص في الأطباق الشرقية والمشاوي.',
                'image_path' => 'chefs/ahmad.jpg',
                'latitude' => 33.5141,
                'longitude' => 36.3384,
                'state_id' => 1,
                'is_frozen' => 0,
            ],
            [
                'user_name' => 'chef_samer',
                'first_name' => 'سامر',
                'second_name' => 'حسن',
                'last_name' => 'عبدالله',
                'email' => 'chef_samer@example.com',
                'password' => Hash::make('password'),
                'mobile_number' => '0933445566',
                'birth_date' => '1992-03-10',
                'overview' => 'شيف مختص في الأطباق التقليدية السورية مثل الكبسة والمقلوبة.',
                'image_path' => 'chefs/samer.jpg',
                'latitude' => 34.5141,
                'longitude' => 36.3384,
                'state_id' => 2,
                'is_frozen' => 0,
            ],
            [
                'user_name' => 'chef_omar',
                'first_name' => 'عمر',
                'second_name' => 'علي',
                'last_name' => 'الحلبي',
                'email' => 'chef_omar@example.com',
                'password' => Hash::make('password'),
                'mobile_number' => '0944332211',
                'birth_date' => '1988-11-25',
                'overview' => 'شيف مختص في الحلويات الشرقية، يملك خبرة تزيد عن 10 سنوات.',
                'image_path' => 'chefs/omar.jpg',
                'latitude' => 36.2015,
                'longitude' => 37.1612,
                'state_id' => 3,
                'is_frozen' => 0,
            ]
        ];

        DB::table('chefs')->insert($chefs);
    }
}
