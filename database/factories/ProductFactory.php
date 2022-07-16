<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $partNumber = strtoupper($this->faker->lexify('??????????'));
        $categoryId = $this->faker->numberBetween(1,5);
        $producerId = $this->faker->numberBetween(1,22);
        $name = $this->faker->lexify('Product ??????');



        return [
            'product_number' => $partNumber,
            'category_id' => $categoryId,
            'producer_id' => $producerId,
            'name' => $name,
            'size_id' => $this->faker->numberBetween(1,20),
            'matrix_id' => $this->faker->numberBetween(1,20),
            'resolution_id' => $this->faker->numberBetween(1,20),
            'refresh_rate_id' => $this->faker->numberBetween(1,20),
            'processor_id' => $this->faker->numberBetween(1,20),
            'ram_id' => $this->faker->numberBetween(1,20),
            'disc_id' => $this->faker->numberBetween(1,20),
            'graphic_card_id' => $this->faker->numberBetween(1,20),
            'os_id' => $this->faker->numberBetween(1,20)
        ];
    }
}
