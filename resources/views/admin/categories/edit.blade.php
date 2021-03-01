@can('admin.categories.edit')
@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1 class="text-center rounded bg-danger">Actualizar una categoria para el Blog</h1>


@stop

@section('content')


   <div class="card">
     <div class="card-body">
        {!! Form::model($category, ['route' =>["admin.categories.update", $category],'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::Label('name', "Nombre :") !!}
            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => "Ingrese el nombre de la categoria"])!!}

            @error('name')

            <span class="text-danger">{{$message}}</span>

            @enderror
        </div>

        <div class="form-group">
            {!! Form::Label('slug', "Slug :") !!}
            {!! Form::text('slug', null,['class' => 'form-control disabled', 'placeholder' => "Ingrese el slug de la categoria", 'readonly' => 'readonly'])!!}

            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror

        </div>

         {!!Form::submit('Actualizar Categoria',['class'=>'btn btn-primary'])!!}

     {!! Form::close() !!}
  </div>
</div>

@stop
@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
$(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>
@stop
@endcan
