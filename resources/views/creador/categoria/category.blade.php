@extends('layouts.panel2')
@section('content')

<div class="col-xl-10 mb-5 mb-xl -0">
    <div class="col-xl-8">
        <div class="card shadow">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-o">ETIQUETA</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
<div>
<!--Ventana Modal-->
 <!-- Button trigger modal -->
 <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nueva eqtiqueta
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="{{route('creador.categoria.alta')}}" method="POST" class="formulario-nuevo" >
{{csrf_field()}}  
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva etiqueta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-4">
      <p>Categoria</p>
        <select name="categoria" id="categoria" class="form-select">
            @foreach ($categoria as $x)
                <option value="{{$x['id']}}">{{$x['nameCategoria']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-md-4">
        <p>Nombre</p>
        <input type="text" placeholder="Nombre de la Subcategoria" id="subcategoria" name="subcategoria">
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn bg-gradient-primary">Guardar</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- <div class="modal fade" id="categoriaCrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="/" method="POST" class="formulario-nuevo" >
{{csrf_field()}}
<div class="modal-dialog" role="document">
  
 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Etiquetas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <div class="form-group" >
       <div class="row">
        <div class="col-md-4">
        <p>Categoria</p>
        <select name="categoria" id="categoria" class="form-select">
            @foreach ($categoria as $x)
                <option value="{{$x['id']}}">{{$x['nameCategoria']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-md-4">
        <p>Nombre</p>
        <input type="text" placeholder="Nombre de la Subcategoria" id="subcategoria" name="subcategoria">
      </div>
      </div>
      
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div>
  </form>
</div>
</div> -->

<!-- mostrar -->

<br>
<h3>Etiqueta</h3>
<div class="card bg-default shadow">  
                <div class="card-header bg-transparent border-0">
                <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush" id="posts-table">
                <thead class="thead-dark">
                  <tr>
                    <!--th scope="col">ID</th-->
                    <th scope="col" >ID</th>
                    <th scope="col">CATEGORIA</th>
                    <!--th scope="col">CONTENIDO</th-->
                    <th scope="col">ETIQUETAS</th>
                    <th scope="col">ACCIONES</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($resultado as $x)
                        <tr>
                            
                            <td> <span class="mb-0 text-sm text-white">
                            {{ $x->id}}
                           </span></td>
                            <td><span class="mb-0 text-sm text-white">{{ $x->nameCategoria}}  </span></td>
                           
                            <td><span class="mb-0 text-sm text-white">{{ $x->name}} </span></td>

                            <td>
                              <from action="{{route('crador.categoria.borrar',$x->id)}}" method="POTS">
                              {{method_field('DELETE')}} {{csrf_field()}}
                              <a href="" class="btn btn-danger" onclik="return confirm('¿ESTAS SEGURO?')">Eliminar</a>
                              </from> 
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
              </table>
              </div>
            </div>
            </div>

@endsection