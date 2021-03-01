@can('admin.categories.index')
@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="text-center text-primary">LISTA DE LAS CATEGORIAS</h1>

@stop

@section('content')

@if(session('info2'))
<div class="alert alert-primary">
<strong>{{session('info2')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(session('info3'))
<div class="alert alert-danger">
<strong>{{session('info3')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(session('info'))
<div class="alert alert-success">
<strong>{{session('info')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<div class="card">
    <div class="card-header">

    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Agregar Categoria</a>
    </div>
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
           @foreach($categories as $category)
           <tr>
               <td>{{$category->id}}</td>
               <td>{{$category->name}}</td>
               <td width="10px"><a href="{{route("admin.categories.edit", $category)}}"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></td></a>
               
               <form action="{{route("admin.categories.destroy", $category)}}" method="POST">
                @csrf
                @method('delete')
                <td width="10px"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></td>
                </form>

           </tr>


           @endforeach
       </tbody>
    </table>
  </div>
</div>
@stop
@endcan
