<x-app-layout>
  <div class="py-8 contenido">
    <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

    <div class="mb-2 text-lg text-gray-500">
      {{$post->extrac}}

    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
      <!--Contendio Principal-->
      <div class="lg:col-span-2">
        <figure>
          <img class="object-cover object-center w-full h-80" src="{{Storage::url($post->image->url)}}">
        </figure>
<div class="mt-4 text-base text-gray-500">
  {{$post->body}}
</div>
      </div>

      <!--Contenido Relacionado-->
      <aside>
   <h1 class="mb-4 text-2xl font-bold text-gray-600">Mas contendio de {{$post->category->name}}</h1>

       <ul>
        @foreach($similares as $similar)
        <li class="mb-4">
            <a class="flex" href="{{route('posts.show', $similar)}}">
                <img class="object-cover object-center h-20 w-36" src="{{Storage::url($similar->image->url)}}">
                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
            </a>
        </li>
        @endforeach
       </ul>
      </aside>

    </div>

  </div>
</x-app-layout>
