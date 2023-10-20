@extends('layouts.consumidor')

@section('content')
<div class="container">
  <div class="row">
@foreach ($video as $videos)
<div class="col">
             
             
                    <video width="320" height="240" autoplay muted playsinline controls>
                    <source  src="{{ Storage::url('rels/'. $videos->nombre)}}" type="video/mp4">
                    <source  src="{{ Storage::url('/rels/'. $videos->nombre)}}" type="video/webm">
                    <source  src="{{ Storage::url('/rels/'. $videos->nombre)}}" type="video/ogg">
                   error
                    </video> 
                    <h4>
                      <h4>
                      <div> <img src="{{ asset('uploads/avatars/'.$videos->user->fotos) }}" class="img-fluid avatar-lg"> {{ $videos->owner->nombreusuario}} / {{$videos->created_at->format('M d y')}}
                          <div> {{$videos->descripcion}}</div>
                    </div>
                    </h4>
                    </h4>
                    
              
      </div>
@endforeach

</div>
     <div class="col-1">
     
    </div>
</div>
@endsection