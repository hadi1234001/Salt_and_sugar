<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'note' => 'لا تضيفوا الكثير من الفلفل',
                'comment' => 'الطلب سريع جداً وممتاز',
                'rate' => 5,
                'client_id' => 1,
                'plate_id' => 1,
                'distributor_id' => 1,
                'price_id' => 1,
                'status_id' => 6, // "تم التسليم"
            ],
            [
                'note' => 'يرجى تسليم الطلب قبل الساعة 2 ظهراً',
                'comment' => null,
                'rate' => null,
                'client_id' => 2,
                'plate_id' => 2,
                'distributor_id' => 2,
                'price_id' => 4,
                'status_id' => 5, // "في الطريق"
            ],
            [
                'note' => 'لا أكلات بحرية من فضلك',
                'comment' => 'لم يتم استلام الطلب بسبب تأخر التوصيل',
                'rate' => 3,
                'client_id' => 3,
                'plate_id' => 3,
                'distributor_id' => 3,
                'price_id' => 7,
                'status_id' => 7, // "تم الإلغاء"
            ],
            [
                'note' => 'يرجى وضع السكاكين والمناديل مع الطلب',
                'comment' => 'ممتاز!',
                'rate' => 5,
                'client_id' => 1,
                'plate_id' => 4,
                'distributor_id' => 2,
                'price_id' => 10,
                'status_id' => 6,
            ],
            [
                'note' => 'بدون صلصة حارة',
                'comment' => null,
                'rate' => null,
                'client_id' => 2,
                'plate_id' => 5,
                'distributor_id' => null, // لم يُخصص موزع بعد
                'price_id' => 13,
                'status_id' => 2, // "تم التأكيد"
            ]
        ];

        DB::table('orders')->insert($orders);
    }
}
