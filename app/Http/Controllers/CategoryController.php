<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category',['name_categorys' => $categories] );
    }

    public function add() 
    {
        return view('category_add');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|unique:categorys|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('category')->with('status', 'Category added successfully');

    }

    public function edit($slug)  
    {
        $category = Category::where('slug', $slug)->first();
        return view('category_edit', ['category' => $category]);
    }

    public function update(Request $request, $slug) 
    {
        $validated = $request->validate([
            'name' => 'required|unique:categorys|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('category')->with('status', 'Category Updated Successfully');

    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category_delete', ['category' => $category]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('status', 'Category Delete Successfully');

    }

    public function category_deleted()
    {
        $deletedcategorys = Category::onlyTrashed()->get();
        return view('category_deleted', ['deletedcategorys' => $deletedcategorys]);
    }

    public function restore($slug) 
    {
        $category = Category::withTrashed()->where('slug',$slug)->first();
        $category->restore();
        return redirect('category')->with('status', 'Category Restore Successfully');
    }
}
