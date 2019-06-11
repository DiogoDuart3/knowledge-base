<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|max:30'
        ]);
        Category::create($data);
        session()->flash('success-message', 'Category created successfully');
        return redirect(route('categories.index'));
    }

    function destroy($id)
    {
        if (Category::findOrFail($id)->issues->count()) {
            session()->flash('error-message', 'Category is being used in posts');
        } else {
            Category::destroy($id);
            session()->flash('success-message', 'Category deleted successfully');
        }
        return redirect(route('categories.index'));
    }

    function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    function update($id){
        $category = Category::findOrFail($id);
        $data = $this->validate(request(), [
            'name' => 'required|min:3|max:30'
        ]);
        $category->name = $data['name'];
        $category->save();
        session()->flash('success-message', 'Category edited successfully');
        return redirect(route('categories.index'));
    }

    function show($id){
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }
}
