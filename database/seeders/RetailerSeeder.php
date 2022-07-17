<?php

namespace Database\Seeders;

use App\Models\Retailer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RetailerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        $retailers = [
            'name' => 'Euro Rtv Agd',
            'name' => 'Media Expert',
            'name' => 'Media Markt',
            'name' => 'X-Kom',
            'name' => 'Komputronik',
            'name' => 'Neonet',
            'name' => 'Sferis'
        ];

        Retailer::insert($retailers);
    }
}
