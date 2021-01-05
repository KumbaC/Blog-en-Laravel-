<x-app-layout>
<div class="py-8 contenido">
   <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
     @foreach($posts as $post)
     <article class="w-full bg-center bg-cover h-80 @if($loop->first) md:col-span-2  @endif" style="background-image: url({{Storage::url($post->image ? $post->image->url : 'post not found')}})">
   <div class="flex flex-col justify-center w-full h-full px-8">

    <div>
    @foreach($post->tags as $tag)
    <a href="{{route('posts.tag',$tag)}}" class="inline-block h-6 px-3 text-white bg-{{$tag->color}}-600 rounded-full">{{$tag->name}}</a>
    @endforeach
    </div>
     <h1 class="mt-2 text-4xl font-bold leading-8 text-white"><a href="{{route('posts.show', $post)}}">
         {{$post->name}}
     </a></h1>
   </div>


    </article>
    @endforeach

   </div>
   <div class="mt-4 ">
       {{$posts->links()}}
   </div>
</div>
</x-app-layout>