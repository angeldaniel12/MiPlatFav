<!--vista para las subsalas -->
@extends('layouts.liveview')

@section('content')
<div class="card-body">
                      <h5 class="card-title">Salas de Streaming</h5>
                      
                      <div>
                      </div class="col-md-6 col-lg-4 mb-3">
                      
                      
                    </div>  

                    
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Examples -->
    <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/imglives/mexico.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Cultural</h5>
                      <p class="card-text">
                      Sala de contenido cultural.
                      </p>
                      <a href="{{route ('rooms')}}" class="btn btn-outline-primary">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                  <img class="card-img-top" src="../assets/img/imglives/educ1.jpeg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Academico</h5>
                      <h6 class="card-subtitle text-muted"></h6>
                      <p class="card-text">Sala de contenido academico.</p>
                      <a href="{{route ('rooms2')}}" class="btn btn-outline-success">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/imglives/sociedad1.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Social</h5>
                      <p class="card-text">
                      Sala de con tenido Social. </p>
                      <a href="{{route ('rooms3')}}" class="btn btn-outline-warning">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                  <img class="card-img-top" src="../assets/img/imglives/tecnologicos.jpeg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Tecnologico</h5>
                      <h6 class="card-subtitle text-muted"></h6>
                      <p class="card-text">Sala de contenido tecnologico.</p>
                      <a href="#" class="btn btn-outline-dark">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/imglives/onu.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Politico</h5>
                      <p class="card-text">
                      Sala de contenido politico. </p>
                      <a href="#∫" class="btn btn-outline-warning">Entrar a sala</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                  <img class="card-img-top" src="../assets/img/imglives/f1.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Deportes</h5>
                      <h6 class="card-subtitle text-muted"></h6>
                      <p class="card-text">Sala de contenido  de deportes.</p>
                      <a href="#" class="btn btn-outline-dark">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              </div>
              

              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/imglives/cine.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Cine</h5>
                      <p class="card-text">
                      Sala de contenido sobre  cine. </p>
                      <a href="#" class="btn btn-outline-warning">Entrar a sala</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                  <img class="card-img-top" src="../assets/img/imglives/turismo .jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Lugares</h5>
                      <h6 class="card-subtitle text-muted"></h6>
                      <p class="card-text">Sala de contenido sobre lugares.</p>
                      <a href="#" class="btn btn-outline-dark">Entrar a sala</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="../assets/img/imglives/sociedad1.jpg" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">Viajes</h5>
                      <p class="card-text">
                      Sala de contenido de viajes. </p>
                      <a href="#" class="btn btn-outline-warning">Entrar a sala</a>
                    </div>
                  </div>
                </div>

</div>
                
</div>
@endsection