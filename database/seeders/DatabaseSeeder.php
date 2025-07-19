<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            VehicleSeeder::class,
            TypeSeeder::class,
            SubTypeSeeder::class,
            ChefSeeder::class,
            PlateSeeder::class,
            PriceSeeder::class,
            ClientSeeder::class,
            OrderStatusSeeder::class,
            DistributorSeeder::class,
            AdminSeeder::class,
            PlateSeeder::class,
            IngredientSeeder::class,
            PlateIngredientSeeder::class,
            OrderSeeder::class,
            OrderPlateSeeder::class,
            RemovedIngredientSeeder::class,
            DistributorLocationSeeder::class
        ]);
    }
}
