<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $processors = [
            [
                'parent_id' => 20,
                'name' => 'i3-11'
            ]
        ];

        Category::insert($processors);
    }
}
