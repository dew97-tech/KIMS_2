<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'category_id' => $this->faker->numberBetween(1, 10),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'unit_id' => $this->faker->numberBetween(1, 10),
            'product_price' => $this->faker->randomFloat(2, 1, 100),
            'product_cost' => $this->faker->randomFloat(2, 1, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
