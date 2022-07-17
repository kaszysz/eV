<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CitySeeder::class,
            ComponentSeeder::class,
            ProducerSeeder::class,
            ProductSeeder::class,
            RetailerPricingSeeder::class,
            RetailerSeeder::class,
            ShopSeeder::class,
            TaskSeeder::class,
            UserSeeder::class,
            VoivodeshipSeeder::class
        ]);
    }
}
