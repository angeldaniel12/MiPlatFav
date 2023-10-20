@extends('layouts.panel2')

@section('content')
<div class="container">
  <div class="row">
@foreach ($v as $video)
<div class="col">
             
             
                    <video width="320" height="240" controls poster="{{ asset('img/illustrations/icon-documentation.svg')}}">
                    <source  src="{{ Storage::url('Storage/rels/'. $video->nombre)}}" type="video/mp4">
                    <source  src="{{ Storage::url('/rels/'. $video->nombre)}}" type="video/webm">
                    <source  src="{{ Storage::url('/rels/'. $video->nombre)}}" type="video/ogg">
                   error
                    </video> 
            
                    
                    <div><h6>{{$video->descripcion}}</h6> </div>
                    
                    <form action="{{route('creador.archivo.borrar',$video->id)}}" method="POST">
                    {{method_field('DELETE')}} {{csrf_field()}}
                    <button type="submit" class="btn btn-danger" >Eliminar</button>
                    </form>
                  
              
      </div>
@endforeach

</div>
     <div class="col-1">
     
    </div>
</div>
@endsection