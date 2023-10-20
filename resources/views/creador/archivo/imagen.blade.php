@extends('layouts.panel2')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('styles')
<link rel="stylesheet" href="sweetalert2.min.css">
@endsection
@section('content')
<div class="container">
  <div class="row">
      @foreach ($imag as $img)
      <div class="col">
              <div class="card">
              <img  src="{{url($img->url)}}" alt="">
              <div></div>
              <label for="">{{$img->descripcion}}</label>
              <div>
                
                <div class="card-footer">
                    <!-- metodo para borrar images -->
                    <form action="{{route('creador.archivo.destroy',$img)}}" class="d-inline formulario-eliminar" method="POST">
                    {{method_field('DELETE')}} {{csrf_field()}}
                      <button type="submit" class="btn btn-danger" >Eliminar</button>
                    </form>

                </div>
             </div>
             </div> 
      @endforeach
      
     </div>
     <div class="col-1">
     {{$imag->links()}}
    </div>
</div>
  @section('script')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     @if(session('eliminar') == 'ok')
        <script>
          Swal.fire(
            'Eliminada',
            'Tu imagen ha sido borrado con exito.',
            'Exitoso'
          )
            </script>
        @endif
  <script>
    $('.formulario-eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
  title: 'Deseas borrar esta imagen? ',
  text: "Esta accion no se puede deshacer",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si!'
}).then((result) => {
  if (result.isConfirmed) {
      
    this.submit();
  }
})
    });
    /**/
  </script>
  @endsection           
            
@endsection

<!-- V1s1t4nt3sBIJC -->