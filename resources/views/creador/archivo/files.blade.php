@extends('layouts.panel2')
<!-- corregir paneles -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@section('content')

<div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary ">
            <div class="card-header border-0">
              <div class="row align-items-center">
                
                <div class="col-8">
                  <h4 class="mb-0">SUBIR ARCHIVOS</h4>
                  <h4 class="mb-0">PDF / IMAGENES</h4>
                  <h4 class="mb-0">Rels</h4>
                </div>
                <!--button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Nuevo</button-->
              </div>
            </div>
            </div>
            </div>

      <!-- Modal -->
      <div class="card-body">
        <form enctype="multipart/form-data" action="{{route ('creador.archivo.Subidos')}}" class="formulario-pdf" method="POST">
            @csrf
            <div class="card card-frame">
  <div class="card-body">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SUBIR DOCUMENTOS PDF</h5>
                   
                    </div>
                    
                    <div class="card card-frame">
                        <div class="form-group">
                            <label for="name">Titulo</label>
                            <input type="text" class="form-control"  name="nombre">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Archivo</label>
                              <div class="custom-file">
                                <!-- <input type="file" class="custom-file-input" id="customFileLang">
                                    <label class="custom-file-label" for="customFileLang">seleccionar archivo</label>
                                </div> -->
                             <input type="file" class="form-control-file" name="pdf" accept="application/pdf" required> 
                          </div>
                        
                    </div>
                    <div class="">
                       <button type="submit" class="btn btn-primary" id="btn-register">Guardar</button>
                    </div>
                </div>

            </div>
        </form>
</div>
        <!-- modal para subir imagenes -->
        <form enctype="multipart/form-data" action="{{route ('creador.archivo.store')}}" class="formulario-imagen" method="POST" >
            @csrf
            
           <div class="card card-frame">
          <div class="card-body">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SUBIR IMAGENES</h5>
                   
                    </div>
                    <div class="modal-body" style="">
                    <div class="form-group">
                           
                            <label for="name">Descripcion</label>
                            <textarea id="descripcion"style="overflow:auto;resize:none" rows="4" name="descripcion" class="form-control form-control-alternative" maxlength="190"></textarea>
                            <span class="help-block">
           <p id="mensaje_ayuda" class="help-block">Cuerpo del mensaje de alerta</p>
                </span>
                           
                </div>
                      <div class="form-group">
                            <label for="exampleFormControlFile1">Imagenes</label>
                            <div class="col-lg-4 ">
                      <div class="form-group">
                        <input type="file"  name="img" id="" accept="image/*" required>
                        
                        
                     </div>
                    </div> 
                            
                        
                    </div>
                    <div class="">
                       <button type="submit" class="btn btn-primary" id="btn-register" name="btn-register">Guardar</button>
                    </div>
                </div>
            </div>
            
        </form>

        <form enctype="multipart/form-data" action="{{ route ('creador.archivo.cargar') }}"  method="POST" >
            @csrf
            
           <div class="card card-frame">
          <div class="card-body">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SUBIR RELS</h5>
                   
                    </div>
                    <div class="modal-body" style="">
                    <div class="form-group">
                           
                            <label for="name">Descripcion</label>
                            <textarea id="descripcion"style="overflow:auto;resize:none" rows="4" name="descripcion" class="form-control form-control-alternative" maxlength="190"></textarea>
                            <span class="help-block">
           <p id="mensaje_ayuda" class="help-block"></p>
                </span>
                           
                </div>
                      <div class="form-group">
                            <label for="exampleFormControlFile1">Rels</label>
                            <div class="col-lg-4 ">
                      <div class="form-group">
                        <input type="file"  name="video" id="" accept="video/*" required>
                        
                        
                     </div>
                    </div> 
                            
                        
                    </div>
                    <div class="">
                       <button type="submit" class="btn btn-primary" id="btn-register" name="btn-register">Subir</button>
                    </div>
                </div>
            </div>
            
        </form>
        
@endsection

@section('script')
<script>
  $('#mensaje_ayuda').text('190 carácteres restantes');
  $('#descripcion').keydown(function () {
      var max = 190;
      var len = $(this).val().length;
      if (len >= max) {
          $('#mensaje_ayuda').text('Has llegado al límite');// Aquí enviamos el mensaje a mostrar          
          $('#mensaje_ayuda').addClass('text-danger');
          $('#descripcion').addClass('is-invalid');
          $('#inputsubmit').addClass('disabled');    
          document.getElementById('inputsubmit').disabled = true;                    
      } 
      else {
          var ch = max - len;
          $('#mensaje_ayuda').text(ch + ' carácteres restantes');
          $('#mensaje_ayuda').removeClass('text-danger');            
          $('#descripcion').removeClass('is-invalid');            
          $('#btn-register').removeClass('disabled');
          document.getElementById('btn-register').disabled = false;            
      }
  });  
</script>  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
      $('.formulario-pdf').submit(function(e){
      Swal.fire({
    icon: 'success',
    title: 'Archivos subidos',
    text: 'Se realizo con exito!',
    showConfirmButton: false,
    timer: 3500
  })
  });
    </script>
    <script>
      $('.formulario-imagen').submit(function(e){
      Swal.fire({
    icon: 'success',
    title: 'Imagen subido',
    text: 'Se realizo con exito!',
    showConfirmButton: false,
    timer: 3500
  })
  });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection