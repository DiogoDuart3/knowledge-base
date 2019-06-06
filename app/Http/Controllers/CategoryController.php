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
        session()->flash('success-message', 'Categoria criada com sucesso.');
        return redirect(route('categories.index'));
    }

    function destroy($id)
    {
        if (Category::find($id)->posts->count()) {
            session()->flash('error-message', 'Categoria está a ser usada em posts.');
        } else {
            Category::destroy($id);
            session()->flash('success-message', 'Categoria apagada com sucesso.');
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
        session()->flash('success-message', 'Categoria editada com sucesso.');
        return redirect(route('categories.index'));
    }

    function show($id){
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }
}
