        
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset ('img/favicon.png')}}">
  <title>
    Watch- Inicio de Sesión 
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset ('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset ('nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset ('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset ('css/new/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              Watch
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route ('register') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Registrarse
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('login') }}" >
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Iniciar Sesión
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="{{route ('home')}}" class="btn btn-sm mb-0 me-1 btn-primary">Bienvenidos</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                                   
                   <!-- Error en caso de ingresar la contraseña o correo incorrecto   -->
                
                @if ($errors->any())

                    <div class="text-center text-muted mb-2">
                    <h4>Se encontro el siguiente error.</h4>
                    </div>

                    <div class="alert alert-danger mb-4" role="alert">
                      {{ $errors->first() }}
                      </div>
                    @else
                  <h4 class="font-weight-bolder">Inicio de Sesión</h4>
                  <p class="mb-0">Ingresa con tu Correo Electronico</p>
                </div>
                @endif

                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('login') }}">
                  @csrf  
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Correo Electronico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Contraseña" name="password" required autocomplete="current-password">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="rememberMe">Recordar sesión</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Iniciar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    No tienes una cuenta?
                    <a href="{{ route ('register') }}" class="text-primary text-gradient font-weight-bold">Registrate</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Bienvenidos a Watch"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset ('js/core/popper.min.js')}}"></script>
  <script src="{{ asset ('js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset ('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset ('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset ('js/new/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>


<!-- @extends('layouts.form') 
@section('title', 'Inicia sesión') @section('content')
  <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7"> 
          <div class="card bg-secondary shadow border-0">
          
        

            <div class="card-body px-lg-5 py-lg-5">

               @if ($errors->any())

               <div class="text-center text-muted mb-2">
                <h4>Se encontro el siguiente error.</h4>
              </div>

               <div class="alert alert-danger mb-4" role="alert">
                  {{ $errors->first() }}
                  </div>

               @else

               <div class="text-center text-muted mb-4">
                <small>Ingresar con correo electronico</small>
              </div>

               @endif 

            


              <form role="form" method="POST" action="{{ route('login') }}">
                @csrf  
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Correo Electronico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="current-password">
                    <div class="text-center">
                    </div>
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name= "remember" class="custom-control-input" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember">
                    <span class="text-muted">Recordar sesión</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href= "{{ route('password.request') }}" class="text-light"><small>Olvidaste tu contraseña?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route ('register') }}" class="text-light"><small>Crear nueva cuenta</small></a>
            </div>
          </div>
        </div>
      </div>
</div>



@endsection -->


