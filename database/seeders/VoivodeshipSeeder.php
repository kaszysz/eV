<?php

namespace Database\Seeders;

use App\Models\Voivodeship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoivodeshipSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {

        $voivodeships = [
            'dolnośląskie',
            'kujawsko-pomorskie',
            'lubelskie',
            'lubuskie',
            'łódzkie',
            'małopolskie',
            'mazowieckie',
            'opolskie',
            'podkarpackie',
            'podlaskie',
            'pomorskie',
            'śląskie',
            'świętokrzyskie',
            'warmińsko-mazurskie',
            'wielkopolskie',
            'zachodniopomorskie'
        ];

        foreach ($voivodeships as $voivodeship){
            Voivodeship::create(['name' => ucfirst($voivodeship)]);
        }
    }
}
