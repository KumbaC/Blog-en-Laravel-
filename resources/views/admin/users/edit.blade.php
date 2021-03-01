@can('admin.users.edit')
@extends('adminlte::page')

@section('title', 'Asignar rol')

@section('content_header')
    <h1 class="text-center text-danger">Asignar un rol</h1></a>

@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{$user->name}}</p>
        <h2 class="h5">Listado de roles</h2>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

         @foreach($role as $roles)
         <div>
             <label>
                 {!! Form::checkbox('roles[]', $roles->id, null, ['class'=>'mr-1']) !!}
                 {{$roles->name}}

             </label>

         </div>


         @endforeach
         <br>
         {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}



        {!!Form::close() !!}
    </div>
</div>




@stop
@endcan