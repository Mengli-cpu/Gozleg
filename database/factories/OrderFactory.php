<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $p = Product::inRandomOrder()->first();
        return [
            'product_id'=>$p->id,
            'total_price'=>$p->price,
            'status'=>fake()->boolean(80)?'pending':'cancelled',
        ];
    }
}
