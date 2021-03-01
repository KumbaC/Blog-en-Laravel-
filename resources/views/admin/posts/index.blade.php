@can('admin.posts.index')
@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')

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
@if(session('info2'))
<div class="alert alert-primary">
<strong>{{session('info2')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

    <h1 class="text-center rounded bg-warning">LISTADOS DE LOS POSTS PUBLICADOS</h1>

@livewire('admin.posts-index')


@stop

@section('content')



@stop
@endcan