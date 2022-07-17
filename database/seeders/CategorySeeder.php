<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        $categories = [
            [
                'parent_id' => null,
                'name' => 'Notebooks'
            ],
            [
                'parent_id' => null,
                'name' => 'Tablets'
            ],
            [
                'parent_id' => null,
                'name' => 'Visuals'
            ],
            [
                'parent_id' => null,
                'name' => 'AIO'
            ],
            [
                'parent_id' => null,
                'name' => 'Desktops'
            ],
            [
                'parent_id' => null,
                'name' => 'Components'
            ],
        ];

        $notebooks = [
            [
                'parent_id' => 1,
                'name' => 'Non-Gaming'
            ],
            [
                'parent_id' => 1,
                'name' => 'Gaming'
            ],
        ];

        $visuals = [
            [
                'parent_id' => 3,
                'name' => 'Non-Gaming'
            ],
            [
                'parent_id' => 3,
                'name' => 'Gaming'
            ],
        ];

        $desktops = [
            [
                'parent_id' => 5,
                'name' => 'Non-Gaming'
            ],
            [
                'parent_id' => 5,
                'name' => 'Gaming'
            ],
        ];

        $components = [
            [
                'parent_id' => 6,
                'name' => 'Processors'
            ],
            [
                'parent_id' => 6,
                'name' => 'Graphic Cards'
            ],
            [
                'parent_id' => 6,
                'name' => 'Discs'
            ],
            [
                'parent_id' => 6,
                'name' => 'Resolutions'
            ],
            [
                'parent_id' => 6,
                'name' => 'Refresh Rates'
            ],
            [
                'parent_id' => 6,
                'name' => 'Sizes'
            ],
            [
                'parent_id' => 6,
                'name' => 'OS'
            ]
        ];

        Category::insert($categories);
        Category::insert($notebooks);
        Category::insert($visuals);
        Category::insert($desktops);
        Category::insert($components);
    }
}
