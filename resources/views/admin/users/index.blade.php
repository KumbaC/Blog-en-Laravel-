@can('admin.users.index')


@extends('adminlte::page')

@section('title', 'Lista de users')

@section('content_header')

    <h1 class="text-center text-primary">LISTA DE USUARIOS</h1></a>


@stop

@section('content')

@livewire('admin.users-index')


@stop

@endcan


