<?php

namespace Database\Seeders;

use App\Models\CategoryProducer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesProducersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProducer::factory(50)->create();
    }
}
