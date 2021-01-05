<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view("admin.tags.index",compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);


        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('info','Se creo un nuevo tag con exito! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:categories',
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.index')->with('info2','El tag se actualizo con exito! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag ->delete();
        return redirect()->route('admin.tags.index')->with('info3','El tag se elimino con exito! ');
    }
}
