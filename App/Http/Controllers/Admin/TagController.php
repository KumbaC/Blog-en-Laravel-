<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index');
    }
   
    public function index()
    {
        $tags = Tag::all();
        return view("admin.tags.index",compact('tags'));
    }

    
    public function create()
    {
        $colors = [
            'red' => 'Color Rojo',
            'yellow' => 'Color Amarillo',
            'green' => 'Color Verde',
            'blue' => 'Color Azul',
            'pink' => 'Color Rosado',
            'purple' => 'Color Purpura',
            'indigo' => 'Color Indigo',
            'gray' => 'Color Gris',
        ];
        return view("admin.tags.create", compact('colors'));
    }

    public function store(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);


        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('info','Se creo un nuevo tag con exito! ');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color Rojo',
            'yellow' => 'Color Amarillo',
            'green' => 'Color Verde',
            'blue' => 'Color Azul',
            'pink' => 'Color Rosado',
            'purple' => 'Color Purpura',
            'indigo' => 'Color Indigo',
            'gray' => 'Color Gris',
        ];
        return view("admin.tags.edit", compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.index')->with('info2','El tag se actualizo con exito! ');
    }

    public function destroy(Tag $tag)
    {
        $tag ->delete();
        return redirect()->route('admin.tags.index')->with('info3','El tag se elimino con exito! ');
    }
}
