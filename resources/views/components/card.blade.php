@props(['post'])
<article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
    <img class="object-cover object-center w-full h-72" src="{{Storage::url($post->image ? $post->image->url : 'post not found')}}">
    <div class="px-6 py-4">
        <h1 class="mb-2 text-xl font-bold">
            <a href="{{route("posts.show",$post)}}" class="">{{$post->name}}</a>
        </h1>
        <div class="text-base text-gray-700">
            {{$post->extrac}}
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach($post->tags as $tag)
            
            <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 py-1 mr-2 text-sm text-gray-700 bg-gray-200 rounded-full">{{$tag->name}}</a>

            @endforeach
        </div>
</article>