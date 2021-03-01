<div class="form-group">
    {!! Form::Label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del posts']) !!}
  @error('name')
     <small class="text-danger">{{$message}}</small>
  @enderror
  </div>
  <div class="form-group">
      {!! Form::Label('slug', 'Slug: ') !!}
      {!! Form::text('slug',null,['class' => 'form-control disabled', 'placeholder' => 'Ingrese el slug del posts','readonly' => 'readonly']) !!}
      @error('slug')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>

    <div class="form-group">
      {!! Form::Label('category_id', "Categoria:") !!}
      {!! Form::select('category_id', $category, null,['class' => 'form-control'])!!}

      @error('category_id')
     <small class="text-danger">{{$message}}</small>
     @enderror
  </div>
  <div class="form-group">

      <p class="font-weight-bold">Etiquetas:</p>
  @foreach($tag as $tags)
  <label class="mr-4">
  {!! Form::checkbox('tags[]', $tags->id, null) !!}

  {{$tags->name}}
  </label>
  @endforeach

  @error('tags')
     <small class="text-danger">{{$message}}</small>
  @enderror
  </div>
  <hr>

  <div class="form-group">
      <p class="font-weight-bold">Estado:</p>
      <label>
          {!! Form::radio('status',1 ,null) !!}
          Borrador
      </label>
      <label>
          {!! Form::radio('status',2 ,null) !!}
          Publicado
      </label>
     <hr>

      @error('status')
      <small class="text-danger">{{$message}}</small>
   @enderror
  </div>
  <div class="mb-3 row">

  <div class="col">
    <div class="image-wrapper">
       @if($Post->image)  <img id="random" src="{{Storage::url($Post->image->url)}}"> @else <img id="random" src="/storage/image/interrogacion.gif"> @endif
    </div>

  </div>

  <div class="col">
     <div class="form-group">
  {!! Form::label('file', 'Imagen para mostrar en el blog') !!}
  {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
     @error('file')
  <small class="text-danger">{{$message}}</small>
     @enderror
     </div>
     <p>Atque consequuntur et deleniti voluptatem. Suscipit facere cum nostrum iste qui iusto et. Quisquam officia omnis recusandae ex eaque. Facere unde error et qui at vitae. Asperiores dolor nisi consequatur consequatur sed officiis voluptatem. Voluptatibus et et neque itaque. Voluptas ea veritatis harum optio quisquam qui. Velit quia quaerat fuga omnis. Ipsa sint adipisci iusto. Adipisci natus voluptatem qui ullam cum mollitia. Enim illum vel commodi. Alias ipsa praesentium ad provident adipisci ea dicta debitis. </p>
  </div>

  </div>


  <div class="form-group">
      {!! Form::Label('extrac', "Extracto:") !!}
  {!! Form::textarea('extrac', null, ['class' => 'form-control']) !!}

  @error('extrac')
     <small class="text-danger">{{$message}}</small>
  @enderror
  </div>

  <div class="form-group">
      {!! Form::Label('body', "Cuerpo del posts:") !!}
  {!! Form::textarea('body',null, ['class' => 'form-control']) !!}

  @error('body')
     <small class="text-danger">{{$message}}</small>
  @enderror
  </div>
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
