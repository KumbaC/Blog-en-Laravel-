@can('admin.posts.edit')
@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
<h1 class="text-center rounded bg-danger">Actualizar posts para el Blog</h1>

@stop

@section('content')
<div class="card">
    <div class="card-body">
{!! Form::model($Post,['route' => ['admin.posts.update',$Post],'method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}

   @include('admin.posts.partials.form')

   {!! Form::Submit('Actualizar Posts', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



  </div>
</div>
@stop
@endcan
