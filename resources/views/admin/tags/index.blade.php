@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Inicio de los tags del blog</h1></a>

@stop

@section('content')
@if(session('info'))
<div class="alert alert-primary">
<strong>{{session('info')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if(session('info2'))
<div class="alert alert-success">
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

<div class="card">
    <div class="card-header">

    <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Añadir nuevo tag</a>
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
           @foreach($tags as $tag)
           <tr>
               <td>{{$tag->id}}</td>
               <td>{{$tag->name}}</td>
               <td width="10px"><a href="{{route("admin.tags.edit", $tag)}}"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></td></a>
               
               <form action="{{route("admin.tags.destroy", $tag)}}" method="POST">
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
