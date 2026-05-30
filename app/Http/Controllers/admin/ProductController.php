<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('auth.products.show', compact('product'));
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
            'img'            => 'nullable|mimes:jpeg,jpg,png|max:8192',
            'shop'           => 'nullable|string|max:255',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
        ]);
        if ($request->hasAny('img')) {
            $path = $request->file('img')->store('products', 'public');
        };
        Product::create([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'name_tm' => $request['name_tm'],
            'name_ru' => $request['name_ru'],
            'description' => $request['description'],
            'description_tm' => $request['description_tm'],
            'description_ru' => $request['description_ru'],
            'img' => $path,
            'shop' => $request['shop'],
            'price' => $request['price'],
            'stock' => $request['stock'],
        ]);

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
            'img'            => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'shop'           => 'nullable|string|max:255',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
        ]);
        if ($request->hasAny('img')) {
            Storage::disk('public')->delete($request->img);
            $path = $request->file('img')->store('products', 'public');
        };

        $product = Product::findOrFail($id);
        $product->update([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'name_tm' => $request['name_tm'],
            'name_ru' => $request['name_ru'],
            'description' => $request['description'],
            'description_tm' => $request['description_tm'],
            'description_ru' => $request['description_ru'],
            'img' => $path,
            'shop' => $request['shop'],
            'price' => $request['price'],
            'stock' => $request['stock'],
        ]);

        return redirect()->route('auth.products.index')->with('success', 'Updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('auth.products.index')->with('success', 'Deleted successfully!');
    }
    public function low_stock_show()
    {
        $products = Product::where('stock', '<', 5)->paginate(10);
        return view('auth.details.low_stock', compact('products'));
    }
}
