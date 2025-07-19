<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status' => 'قيد الإنشاء'],
            ['status' => 'تم التأكيد'],
            ['status' => 'قيد التجهيز'],
            ['status' => 'جاهز للتسليم'],
            ['status' => 'في الطريق'],
            ['status' => 'تم التسليم'],
            ['status' => 'تم الإلغاء'],
            ['status' => 'متأخر'],
        ];

        DB::table('order_statuses')->insert($statuses);
    }
}
