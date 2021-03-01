<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index');
    }

    
    public function index()
    {
        $post = Post::all();
        return view("admin.posts.index", compact('post'));
    }

    
    public function create(Post $Post)
    {
        $category = Category::pluck('name', 'id');
        $tag = Tag::all();
        return view("admin.posts.create", compact('category','tag','Post'));
    }

    
    public function store(StorePostRequest $request)
    {
         $post = Post::create($request->all());
         if($request->file('file')){
           $url = Storage::put('posts', $request->file('file'));
           $post->image()->create([
               'url' => $url
           ]);
         }

          if($request->tags){
            $post->tags()->attach($request->tags);
            return redirect()->route('admin.posts.index', $post)->with('info','¡Se creo un nuevo posts con exito! ');
       }
    }


    public function edit(Post $Post)
    {
        $this->authorize('author', $Post);
        $category = Category::pluck('name', 'id');
        $tag = Tag::all();

        return view("admin.posts.edit", compact('category','tag','Post'));

    }

    public function update(StorePostRequest $request, Post $Post)
    {
        $this->authorize('author', $Post);
        $Post->update($request->all());

           if($request->file('file')){
             $url = Storage::put('posts', $request->file('file'));
           if($Post->image){
               Storage::delete($Post->image->url);

               $Post->image()->update([
                'url' => $url
            ]);
           }
           else{
               $Post->image()->create([
                   'url' => $url
               ]);
           }

         }

          if($request->tags){
            $Post->tags()->sync($request->tags); //Sync elimina las etiquetas relacionadas al post y los genera nuevamente con el post actualizado
       }
       return redirect()->route('admin.posts.index', $Post)->with('info2','¡Se actualizo el posts con exito! ');

        }


    public function destroy(Post $Post)
    {
        $this->authorize('author', $Post);
        $posts = Post::find($Post->id);
        $posts->delete();
        return Redirect()->route('admin.posts.index')->with('info3','El posts se elimino con exito! ');
    }
}
