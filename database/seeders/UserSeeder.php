<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'surname' => 'Admin',
            'voivodeship_id' => 1,
            'city_id' => 1,
            'street' => 'Adminstreet',
            'phone_number' => '666666666',
            'email' => 'admin@admin.pl',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        User::create($admin);
        User::factory(50)->create();
    }
}
