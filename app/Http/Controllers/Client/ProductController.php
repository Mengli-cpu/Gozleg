<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->filled('query')) {
            $search = $request->input('query');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_ru', 'like', "%{$search}%")
                    ->orWhere('name_tm', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->sort === 'popular') {
            $query->orderBy('like_count', 'desc');
        } elseif ($request->sort === 'trending') {
            $query->orderBy('view_count', 'desc');
        } elseif ($request->sort === 'price_low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('client.products.index', compact('products', 'categories'));
    }
    public function apiIndex(Request $request)
    {
        $query = Product::query();
        if ($request->filled('query')) {
            $search = $request->input('query');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_ru', 'like', "%{$search}%")
                    ->orWhere('name_tm', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->sort === 'popular') {
            $query->orderBy('like_count', 'desc');
        } elseif ($request->sort === 'trending') {
            $query->orderBy('view_count', 'desc');
        } elseif ($request->sort === 'price_low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'price_high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }
        return response()->json($query->latest()->paginate(12)->withQueryString());
    }
    public function productShow($id)
    {
        $product = Product::with(['category'])->findOrFail($id);
        return view('client.products.show', compact('product'));
    }
    public function apiProductShow($id)
    {
        $product = Product::with(['category'])->findOrFail($id);
        return response()->json($product);
    }
}