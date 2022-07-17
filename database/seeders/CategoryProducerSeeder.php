<?php

namespace Database\Seeders;

use App\Models\CategoryProducer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProducerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        CategoryProducer::factory(50)->create();
    }
}
