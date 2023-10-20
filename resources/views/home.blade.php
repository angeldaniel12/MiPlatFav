@extends('layouts.panel2') <!-- La vista de la que se va a heredar es panel, 
buscar la forma de darle funcion a los botones de acuerdo a lo que ya tenemos desde la vista Panel -->

@section('content')
<!-- Pegamos el codigo del Container-->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Archivos Compartidos</p>
                    @php
                    use App\Models\Archivos;
                   

                    $id=Auth::id();
                  
                    $archi = Archivos::where('user_id', $id)->count();
                      
                    @endphp
                    <h5 class="font-weight-bolder">
                    {{$archi}}
                    <div class="progress-wrapper">
            <div class="progress-info">
              <div class="progress-percentage">
                  
              </div>
            </div>
               <!-- <div class="progress">
                 <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                </div>
                  </div> -->
                    </h5>
                    <p class="mb-0">
                      <!-- <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday -->
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-copy-04 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Seguidores</p>
                    @php
                            use App\Models\Follower;
                            use App\Models\User;
                            $id=Auth::id();
                           
                        $seguir=Follower::where('following_id',$id)->count();
                        @endphp
                    <h5 class="font-weight-bolder">
                    {{$seguir}}
                    </h5>
                    
                    <p class="mb-0">
    
                      <!-- <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week -->
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Posts Compartidos</p>
                    @php
                    use App\Models\Post;
                    use Illuminate\Support\Facades\Auth;                  
                    $posts = Post::where('user_id',$id)->count();
                      
                    @endphp
                    <h5 class="font-weight-bolder">
                    {{$posts}}
                    </h5>
                    <p class="mb-0">
                      <!-- <span class="text-success text-sm font-weight-bolder">+2%</span>
                      since last quarter -->
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Galeria</p>
                    @php
                    use App\Models\Photo;
                  
                    $fotos = Photo::where('user_id',$id)->count();
                      
                    @endphp
                    <h5 class="font-weight-bolder">
                    {{$fotos}}
                    </h5>
                    <p class="mb-0">
          
                      <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> than last month -->
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-album-2 text-lg opacity-10" aria-hidden="true"></i>

                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Videos</p>
                    @php
                    use App\Models\Video;
                  
                  
                    $videos = Video::where('user_id',$id)->count();
                      
                    @endphp
                    <h5 class="font-weight-bolder">
                    {{$videos}}
                    </h5>
                    
                    <p class="mb-0">
    
                      <!-- <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week -->
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


     <!-- 2do panel -->

      <div class="row">
      <h2>proceso de desarrollo</h2>
      <div class="progress-wrapper">
  <div class="progress-info">
    <div class="progress-percentage">
    @php
      
     
      $videos = Video::where('user_id',$id)->count();
      $fotos = Photo::where('user_id',$id)->count();
      $posts = Post::where('user_id',$id)->count();
      $seguir=Follower::where('following_id',$id)->count();
      $archi = Archivos::where('user_id', $id)->count();
    @endphp
      <span class="text-sm font-weight-bold">{{$videos+$fotos+$posts+$seguir+$archi}}</span>
    </div>
  </div>
  <div class="progress">
    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="1" style="width: {{$videos+$fotos+$posts+$seguir+$archi}}%;"></div>
  </div>
</div>
      </div>

</div>
  
      

@endsection
