<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'username' => 'admin',
                'password' => Hash::make('123456'), // كلمة المرور: 123456
                'role' => 'admin',
            ],
            [
                'username' => 'super_admin',
                'password' => Hash::make('admin123'),
                'role' => 'super_admin',
            ],
            [
                'username' => 'moderator',
                'password' => Hash::make('mod123'),
                'role' => 'moderator',
            ]
        ];

        DB::table('admin')->insert($admins);
    }
}
