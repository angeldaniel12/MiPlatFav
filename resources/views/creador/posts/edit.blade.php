@extends('layouts.panel2') <!-- La vista de la que se va a heredar es panel, 
buscar la forma de darle funcion a los botones de acuerdo a lo que ya tenemos desde la vista Panel -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"

  referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
@endsection
@section('content')
<!-- Pegamos el codigo del Container-->
<!--  corregir seleccion multiple -->

<div class="col-xl-10 mb-5 mb-xl-0">
        <div class="col-xl-8">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-0">Crear Publicaciones</h6>
                  <h2 class="mb-0">POSTS</h2>
                </div>
              </div>
            </div>
    </div>
</div>      
</div>
<div class="col-xl-20 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-10">
                  <h3 class="mb-0">POST</h3>
                  
           
                    
                </div>
                
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('creador.posts.update', $post)}}" class="formulario-editar">
                {{csrf_field()}} {{method_field('PUT')}}
                <h6 class="heading-small text-muted mb-4">Titulos de Publicacion</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group" {{$errors ->has('title')? 'has-error' : ''}}>
                        <label class="form-control-label" for="input-username">Titulo de la Publicacion</label>
                        <input type="text" name='title' class="form-control form-control-alternative" value="{{old('title',$post->title)}}">
                        {!! $errors->first('title','<span class="help-block">:message</span>')!!}
                      </div>
                    </div>
                    
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group" {{$errors ->has('excerpt')? 'has-error' : ''}}>
                        <label class="form-control-label" for="input-first-name">Introduccion de Publicacion</label>
                        <textarea name="excerpt"class="form-control form-control-alternative" id="" cols="60" rows="5" >{{old('excerpt',$post->excerpt)}}</textarea>
                        {!! $errors->first('excerpt','<span class="help-block">:message</span>')!!}
                      </div>
                    </div>
                    <div class="col-lg-10">
                      <div class="form-group"{{$errors ->has('body')? 'has-error' : ''}}>
                        <label class="form-control-label" for="input-last-name"> Contenido de la Publicacion</label>
                        <textarea class="ckeditor"  name="body" id="editor" class="form-control form-control-alternative" cols="80" rows="5" placeholder="Ingresa el contenido de la publicacion">{{old('boby',$post->body)}}</textarea>
                        {!! $errors->first('body','<span class="help-block">:message</span>')!!}
                      </div>
                    </div>
                     <!-- Fecha de publicacion-->
                    <div class="col-lg-10">
                        <div class="form-group">
                        <label class="form-control-label" for="input-last-name">fecha de Publicacion</label>
                        <input class="form-control" placeholder="Fecha de publicacion" type="text" readonly="readonly" require value="{{ $currentDate }}" name="published_at"  name="published_at">
                       </div>    
                    </div>
                    <div class="col-lg-5">
                            <div class="form-group" {{$errors ->has('category')? 'has-error' : ''}}>
                                <label>Categorias</label>
                                <select name="category"  class="form-control-label"  data-style="btn-primary" id="categoria"> 
                           
                            @foreach ($categories as $category)
                                <option class="form-control form-control-alternative" value="{{$category->id}}" >{{$category->nameCategoria}}</option>
                            @endforeach
                                </select> 
                                {!! $errors->first('category','<span class="help-block">:message</span>')!!}
                            
                        </div>
                  <div class="col-lg-10">
                    <div class="form-group">
                    <label for="">Etiquetas</label>
                    <input type="text" id="subcategoria" name="subcategoria" role="tagsinput">
                    <!-- select multiple para tags -->
                    <select name="tags[]"  id="tag" class="form-select" data-style="btn-primary" multiple> 
                    
                        @foreach ($tags as $tag )
                        <option value="{{$tag->id}}">{{$tag->name}}</option>  
                        @endforeach
                       </select> 
                      
                  </div>
                   </div>  
                  
                   
                      
                      <button type="submit"  class="btn btn-primary mt-4">Guardar</button>
                 
                   
              </form>
              
            </div>
            
          </div>
        </div>
        <script type="text/javascript">
    $(document).ready(function() {
        $('#tag').multiselect();
    });
</script>
    
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js" integrity="sha512-yrOmjPdp8qH8hgLfWpSFhC/+R9Cj9USL8uJxYIveJZGAiedxyIxwNw4RsLDlcjNlIRR4kkHaDHSmNHAkxFTmgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script>
 
@stop
@section('script')

 <script>
   $(#categoria).on('change', function({
    var tagsId=$(this).val();
    if(tagsId){
      $.ajax({
        url: '/categories/'+tagsId,
        type: 'GET',
        dataType: 'Json',
        success: function(data){
          $(#tagss).empty();
          $(#tagss).append($('<option>',{
            value: '',
            text: 'seleccione una etiqueta'
          }));
          $.each(data, function(i,tagss){
            $('#tagss').append($('<option>'{
              value: tag.id,
              text:tag.name
            }));
          });
        }
      });
    }else{
      $('#tagss').empty();
      $('#tagss').append($('<option>',{
        value: '',
        text: 'seleccione una etiqueta'
      }));
    }
   }));

</script>  


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
 <!-- <script>
    new Dropzone('.dropzone',{
      url:'/',
     
      dictDefaultMessage: 'Arrastra las fotos aqui para subirlas'
    });
    Dropzone.autoDiscover = false;
    //Dropzone.Discover();
    </script> -->

   <script>
    // se llama para poder seleccionar mas de 1 etiqueta
    $('select').selectpicker();
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $('.formulario-editar').submit(function(e){
      Swal.fire({
  position: 'top-end',
  icon: 'Guardado',
  title: 'Tu post ha sido actualizado con exito',
  showConfirmButton: false,
  timer: 1500
})
});
 </script>
 <script>
 <script>
      CKEDITOR.replace( 'editor' );
    </script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
 </script>
  <script src="/js/post/edits.js"></script> 
<!-- <script src="{{asset('/js/post/edits.js')}}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>  
 @endsection