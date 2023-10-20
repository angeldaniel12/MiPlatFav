@extends('layouts.consumidor')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('styles')
<link rel="stylesheet" href="sweetalert2.min.css">
@endsection
@section('content')

  <div class="row">
      @foreach ($imag as $img)
       <div class="col">
              <div class="card">
               <!--poner nombre de los usuarios que publican la imagen  -->
                    <img  src="{{url($img->url)}}" alt="">
                    <h4>
                      <h4>
                      <div> <img src="{{ asset('uploads/avatars/'.Auth::user()->fotos) }}"  class="img-fluid avatar-lg"> {{ $img->owner->nombreusuario}} / {{$img->created_at->format('M d y')}}
                          <div> {{$img->descripcion}}</div>
                    </div>
                    </h4>
                    </h4>
                  
              </div>
      </div>
      @endforeach
  </div>

@endsection