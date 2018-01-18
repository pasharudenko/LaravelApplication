<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
       $categories = Category::all();
       return view('admin.posts.categories', compact('categories'));
    }

    public function store(Request $request)
    {
       $categories = $request->all();

       Category::create($categories);

       return redirect()->back();
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}
