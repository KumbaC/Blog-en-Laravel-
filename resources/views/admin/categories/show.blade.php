@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <a href="/"><h1>Ir al blog</h1></a>

@stop

@section('content')
    <p>Bienvenido al hermoso SHOW</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
s