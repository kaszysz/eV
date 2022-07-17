<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        City::factory(100)->create();
    }
}
