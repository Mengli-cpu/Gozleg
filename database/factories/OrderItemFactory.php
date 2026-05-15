<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        $p = Product::inRandomOrder()->first();
        return [
            'order_id' => $p?->id,
            'product_id' => $p ?->id,
            'quantity' => fake()->numberBetween(1, 5),
            'price' => $p->price,
        ];
    }
}