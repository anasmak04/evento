<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all();
        return view("admin.dashboard.category.index", compact("categories"));
    }

    public function store(Request $request)
    {
            Category::create($request->all());
            return redirect()->back();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }


    public function update(Category $category , Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);
        return redirect()->back();
    }






}
