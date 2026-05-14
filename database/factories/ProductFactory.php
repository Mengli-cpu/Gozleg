<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $v_c = fake()->numberBetween(1, 100000);
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => fake()->words(3, true),
            'name_ru' => fake()->realText(20),
            'name_tm' => fake()->words(2, true),
            'description' => fake()->paragraph(),
            'description_ru' => fake()->realText(200),
            'description_tm' => fake()->sentence(15),
            'view_count' => $v_c,
            'like_count' => fake()->numberBetween(1, $v_c),
            'price' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
