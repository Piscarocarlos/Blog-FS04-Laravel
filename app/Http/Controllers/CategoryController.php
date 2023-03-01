<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.all', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:2'
        ]);

        $cat = new Category();
        $cat->name = $request->category_name;

        $cat->save();
        // return back();
        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'category_name' => 'required|min:2'
        ]);

        $cat = Category::find($id);
        $cat->name = $req->category_name;

        $cat->save();

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back();
    }
}
