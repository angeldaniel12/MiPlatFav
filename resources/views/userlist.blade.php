
@extends('layouts.consumidor')

@section('content')
<h1>Perfiles de Usuarios</h1>
<div class="container">
  <div class="row">
  @foreach ($users as $user)
      <div class="col">
              <div class="card">
               <div class="card-footer">
                <img src="{{ asset('uploads/avatars/'.$user->fotos) }}" class="avatar avatar-sm me-3">
                    <!-- metodo para borrar images -->
                    <a href="{{ route('perfilusuarios', $user->id) }}">{{ $user->nombre }} 
                    <!-- <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3"> -->
                    <div class="card-footer">
                    @foreach ($fotos as $img)
                    <img  src="{{url($img->url)}}" width="200px" heigt="200px" >
                    @endforeach
                    </div>
              <div class="d-flex center-content-between">
              @if(auth()->user()->isNot($user))
             
        <form method="post" action="{{ route('follow', $user) }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary float-right mb-0 d-none d-lg-block">Seguir</button>
        </form>
  
@endif
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Mensaje</a> <!--abrir una ventana de mensajeria 1 a 1 Y CHECAR QUE NADIE LE MANDE MENSAJES-->
                <!-- <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a> -->
              </div>
             </div>
             </div>
             </div> 
      @endforeach
      </div>
     
</div>

@endsection
