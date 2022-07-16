<?php

namespace Database\Seeders;

use App\Models\Retailer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetailersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Retailer::factory(10)->create();
    }
}
