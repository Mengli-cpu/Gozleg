<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Client
{
    public function home()
    {
        $newProducts = Product::with('category')->orderBy('id', 'asc')->take(8)->get();
        $recommended = Product::inRandomOrder()->take(4)->get();
        $popular = Product::orderBy('view_count', 'asc')->take(10)->get();
        return view("client.home.index", compact('newProducts','recommended','popular'));
    }
}