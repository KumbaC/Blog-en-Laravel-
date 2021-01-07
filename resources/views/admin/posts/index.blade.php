@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="text-center rounded bg-warning">LISTADOS DE LOS POSTS PUBLICADOS</h1></a>
    
@livewire('admin.posts-index')


@stop

@section('content')
@if(session('info3'))
<div class="alert alert-danger">
<strong>{{session('info3')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
    

@stop
