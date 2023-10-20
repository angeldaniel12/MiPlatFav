@extends('layouts.welcomeinv')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido(a)') }} invitado(a)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hola, como estas el dia de hoy?') }}
                </div>
                @auth
                <!--Vista inicial para los usuarios invitados-->
                @endauth
               
            </div>
        </div>
    </div>
</div>



@endsection