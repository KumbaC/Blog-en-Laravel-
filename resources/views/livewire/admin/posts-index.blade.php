<div class="card ">
    <div class="card-header">
        <a href="{{route('admin.posts.create')}}" class="float-right btn btn-secondary">Añadir Posts</button></a>
        <input wire:model="search" class="my-1 form-control col-sm-3" placeholder="Buscar">

    </div>

    @if($posts->count())


    <div class="card-body">

<table class="table table-striped">
<thead>
<tr>
<th>ID</th>
<th>NAME</th>
<th colspan="2"></th>


</tr>
</thead>
<tbody>
    @foreach($posts as $post)
<tr>
<td>{{$post->id}}</td>
<td>{{$post->name}}</td>
<td width="10px"><a href="{{route("admin.posts.edit", $post)}}"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></td></a>

    <form action="{{route("admin.posts.destroy", $post)}}" method="POST">
     @csrf
     @method('delete')
     <td width="10px"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></td>
     </form>
@endforeach


</tr>

</tbody>


</table>


    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>
@else
<div class="card-body">
<center><strong class="text-center">No se encuentran resultados de su busqueda</strong></center>
</div>
    @endif
</div>
