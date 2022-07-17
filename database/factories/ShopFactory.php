<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city_id' => $this->faker->numberBetween(1,20),
            'retailer_id' => $this->faker->numberBetween(1,7),
            'street' => $this->faker->streetAddress(),
            'fsr_id' => $this->faker->numberBetween(1,5),
            'promoter_id' => $this->faker->numberBetween(6,20),
            'priority' => $this->faker->numberBetween(1,3),
            'geo_latitude' => $this->faker->randomFloat(6,50,52),
            'geo_longitude' => $this->faker->randomFloat(6,19,20)
        ];
    }
}
