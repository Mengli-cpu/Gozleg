<?php

namespace App\Http\Controllers\Admin; // Исправили путь

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);
        return back()->with('success', "Order #{$id} status changed to " . strtoupper($request->status));
    }
}
