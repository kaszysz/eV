<?php

namespace Database\Seeders;

use App\Models\RetailerPricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetailerPricingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RetailerPricing::factory(1000)->create();
    }
}
