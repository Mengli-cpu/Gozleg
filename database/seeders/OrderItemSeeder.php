<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderItems = [
            [
                'order_id' => 1,
                'product_id' => 4,
                'quantity' => 12,
                'price' => 120.00,
            ],
            [
                'order_id' => 2,
                'product_id' => 8,
                'quantity' => 1,
                'price' => 199.99,
            ],
            [
                'order_id' => 2,
                'product_id' => 9,
                'quantity' => 2,
                'price' => 35.50,
            ],
            [
                'order_id' => 3,
                'product_id' => 8,
                'quantity' => 16,
                'price' => 199.99,
            ],
            [
                'order_id' => 4,
                'product_id' => 17,
                'quantity' => 8,
                'price' => 12.00,
            ],
            [
                'order_id' => 5,
                'product_id' => 19,
                'quantity' => 20,
                'price' => 25.00,
            ],
        ];

        foreach ($orderItems as $oi) {
            OrderItem::create($oi);
        }
    }
}
