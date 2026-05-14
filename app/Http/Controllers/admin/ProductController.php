<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('auth.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('auth.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'name'           => 'required|min:2|max:255',
            'name_tm'        => 'nullable|min:2|max:255',
            'name_ru'        => 'nullable|min:2|max:255',
            'description'    => 'nullable|string',
            'description_tm' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'shop'           => 'nullable|string|max:255',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
        ]);
        Product::create($request->all());

        return redirect()->route('auth.products.index')->with('success', 'Added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('auth.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'name'           => 'required|min:2|max:255',
            'name_tm'        => 'nullable|min:2|max:255',
            'name_ru'        => 'nullable|min:2|max:255',
            'description'    => 'nullable|string',
            'description_tm' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'shop'           => 'nullable|string|max:255',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('auth.products.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('auth.products.index')->with('success', 'Deleted successfully!');
    }
}