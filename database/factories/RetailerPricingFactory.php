<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RetailerPricing>
 */
class RetailerPricingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(999,5999);
        $sale = $price - 200;
        $isBonus = $this->faker->boolean();

        return [
            'retailer_id' => $this->faker->numberBetween(1,10),
            'retailer_index' => $this->faker->numerify('########') ,
            'product_id' => $this->faker->numberBetween(1,10),
            'price' => $price,
            'sale' => $this->isValue($isBonus, $sale),
            'bonus' => $this->isValue($isBonus, $this->faker->numberBetween(1,6)),
            'bonus_value' => $this->isValue($isBonus, $this->faker->numberBetween(1,100))
        ];
    }

    private function isValue($isValue, $value){
        return $isValue ? $value : null;
    }


}
