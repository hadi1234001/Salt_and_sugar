<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DistributorSeeder extends Seeder
{
    public function run(): void
    {
        $distributors = [
            [
                'user_name' => 'dist_ahmad',
                'first_name' => 'أحمد',
                'second_name' => 'محمد',
                'last_name' => 'السعيد',
                'birth_date' => '1985-07-15',
                'phone_number' => '0998877665',
                'email' => 'dist_ahmad@example.com',
                'password' => Hash::make('password'),
                'chef_id' => 1,
                'vehicle_id' => 1,
            ],
            [
                'user_name' => 'dist_samer',
                'first_name' => 'سامر',
                'second_name' => 'حسن',
                'last_name' => 'عبدالله',
                'birth_date' => '1990-04-10',
                'phone_number' => '0933445566',
                'email' => 'dist_samer@example.com',
                'password' => Hash::make('password'),
                'chef_id' => 1,
                'vehicle_id' => 2,
            ],
            [
                'user_name' => 'dist_omar',
                'first_name' => 'عمر',
                'second_name' => 'علي',
                'last_name' => 'الحلبي',
                'birth_date' => '1988-11-25',
                'phone_number' => '0944332211',
                'email' => 'dist_omar@example.com',
                'password' => Hash::make('password'),
                'chef_id' => 2,
                'vehicle_id' => 3,
            ]
        ];

        DB::table('distributors')->insert($distributors);
    }
}
