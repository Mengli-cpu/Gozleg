<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'product_id' => 4,
                'total_price' => 1500.00,
                'status' => 'completed',
                'created_at' => now(),
            ],
            [
                'product_id' => 8,
                'total_price' => 250.50,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'product_id' => 8,
                'total_price' => 3200.00,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'product_id' => 17,
                'total_price' => 100.00,
                'status' => 'canceled',
                'created_at' => now(),
            ],
            [
                'product_id' => 19,
                'total_price' => 500.00,
                'status' => 'completed',
                'created_at' => now(),
            ],
        ];

        foreach ($orders as $o) {
            Order::create($o);
        }
    }
}