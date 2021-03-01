<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index');
    }

    public function index()
    {

        $categories = category::all();
        return view("admin.categories.index",compact('categories'));
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);


        $category = Category::create($request->all());
        return redirect()->route('admin.categories.index', compact('category'))->with('info2','Se creo una categoria con exito! ');
    }

    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact('category'));
    }

    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);

        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('info','La categoria se actualizo con exito! ');
    }

    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return Redirect()->route('admin.categories.index')->with('info3','La categoria se elimino con exito! ');
    }
}
