<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);
        $total = $product->price * $quantity;
        $order = Order::create([
            'product_id'  => $product->id,
            'total_price' => $total,
            'status'      => 'pending'
        ]);
        $order->items()->create([
            'product_id' => $product->id,
            'quantity'   => $quantity,
            'price'      => $product->price
        ]);

        return back()->with('success', 'Order Accepted');
    }
    public function orderIndex()
    {
        $orders = Order::with('items.product')->latest()->paginate(10);
        return view('client.orders.index', compact('orders'));
    }
    public function show($id)
    {
        return view('client.orders.show');
    }
}
