<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Producer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        $producers =
            [
                ['name' => 'Apple'],
                ['name' => 'Acer'],
                ['name' => 'Asus'],
                ['name' => 'Dell'],
                ['name' => 'HP'],
                ['name' => 'Lenovo'],
                ['name' => 'MSI'],
                ['name' => 'Huawei'],
                ['name' => 'Gigabyte'],
                ['name' => 'Samsung'],
                ['name' => 'TLC'],
                ['name' => 'Nokia'],
                ['name' => 'LG'],
                ['name' => 'Benq'],
                ['name' => 'IIyama'],
                ['name' => 'Philips'],
                ['name' => 'AOC'],
                ['name' => 'Xiaomi'],
                ['name' => 'Razer'],
                ['name' => 'Logitech']
            ];

        Producer::insert($producers);
    }
}
