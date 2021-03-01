@can('admin.posts.create')

@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
<h1 class="text-center rounded bg-warning">CREAR UN NUEVO POSTS PARA EL BLOG</h1>

@stop

@section('content')

<div class="card">
    <div class="card-body">
{!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

{{--{!! Form::hidden('user_id',auth()->user()->id) !!}--}}

@include('admin.posts.partials.form')

{!! Form::Submit('Crear Posts', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
  </div>
</div>
@stop
@section('css')

<style>

.image-wrapper{

position: relative;
padding-bottom: 56.25%;

}
.image-wrapper img{

position: absolute;
object-fit: cover;
width: 100%;
height: 100%;

}
</style>
@stop


@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="{{asset('vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script>
$(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
ClassicEditor
    .create( document.querySelector( '#extrac' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
//Cambiar imagen

document.getElementById('file').addEventListener('change', cambiarimagen);

function cambiarimagen(event){
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = (event) => {
        document.getElementById("random").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL(file);
}


</script>
@stop
@endcan




