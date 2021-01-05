<x-app-layout>
<div class="max-w-5xl px-2 py-8 mx-auto sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-center upercase">Categoria: {{$category->name}}</h1>
@foreach($posts as $post)
<x-card :post="$post"/>
@endforeach
<div class="mt-4">
    {{$posts->links()}}
</div>
</div>

</x-app-layout>