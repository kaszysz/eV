<?php

namespace Database\Seeders;

use App\Models\RetailerPricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetailerPricingSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        RetailerPricing::factory(10000)->create();
    }
}
