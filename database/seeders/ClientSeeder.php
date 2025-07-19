<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'علي أحمد',
                'phone_number' => '0998877665',
                'email' => 'ali@example.com',
                'password' => Hash::make('password'),
                'overview' => 'عميل دائم يفضل الأطباق السريعة.',
                'birth_date' => '1995-08-10',
                'mobile_number' => '0933445566',
                'latitude' => 33.5141,
                'longitude' => 36.3384,
                'state_id' => 1,
                'is_frozen' => 0,
            ],
            [
                'name' => 'سارة حسن',
                'phone_number' => '0987654321',
                'email' => 'sara@example.com',
                'password' => Hash::make('password'),
                'overview' => 'تحب تجربة أطباق جديدة وترسل ملاحظات مفيدة.',
                'birth_date' => '1998-04-22',
                'mobile_number' => '0944556677',
                'latitude' => 34.5141,
                'longitude' => 36.3384,
                'state_id' => 2,
                'is_frozen' => 0,
            ],
            [
                'name' => 'أحمد محمد',
                'phone_number' => '0912345678',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password'),
                'overview' => 'عميل جديد، يحب الأطباق التقليدية.',
                'birth_date' => '2000-12-05',
                'mobile_number' => '0955667788',
                'latitude' => 36.2015,
                'longitude' => 37.1612,
                'state_id' => 3,
                'is_frozen' => 0,
            ]
        ];

        DB::table('clients')->insert($clients);
    }
}
