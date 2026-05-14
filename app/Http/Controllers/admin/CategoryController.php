<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('auth.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('auth.categories.create');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('auth.categories.edit', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'name_tm' => 'min:2|nullable|max:255',
            'name_ru' => 'min:2|nullable|max:255',
        ]);
        Category::create([
            'name' => $request->name,
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
        ]);

        return redirect()->route('auth.categories.index')->with('success', 'Added successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'name_tm' => 'min:2|nullable|max:255',
            'name_ru' => 'min:2|nullable|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
        ]);

        return redirect()->route('auth.categories.index')->with('success', 'Updated!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('auth.categories.index')->with('success', 'Deleted!');
    }
}
