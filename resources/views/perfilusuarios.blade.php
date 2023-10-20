
@extends('layouts.consumidor')


@section('content')

<div class="col-xl-4 order-xl-2 mb-5 mb-xl-5">

          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                  <img src="{{ asset('uploads/avatars/'.$useres->fotos) }}" class="rounded-circle">
                  
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                        @php
                            use App\Models\Follower;
                            use App\Models\User;
                            $id=Auth::id();
                            
                        $seguir=Follower::where('following_id',$id)->count();
                        @endphp
                      <span class="heading">{{$seguir}}</span>
       
                      <span class="description">Friends</span>
                    </div>
                    <div>
                  @php
                      
                      use App\Models\Photo;
                      $id=Auth::id();
                        $contador=Photo::where('user_id',$id)->count();
                  @endphp
                      <span class="heading">{{$contador}}</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                    @php
                    use App\Models\Post;
                    $per=Auth::user();                 
                    $postes = Post::where('user_id',$per)->count();
                      
                    @endphp
                      <span class="heading">{{$postes}}</span>
                      <span class="description">Post</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                nombre: {{ $useres->nombre }}<span class="font-weight-light">, 27</span>
               {{ $useres->nombreusuario }}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{$useres->pais}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{$useres->email}}
                </div>
                <div>
                  <i class="ni education_hat mr-2">Sobre mi: </i>{{$useres->descripcion}}
                </div>
                
                <!-- <a href="#">Show more</a> -->
            
              </div>
            </div>
            
          </div>
          <!--  -->
          
          <!--  -->
        </div>
</div> 


        
        @foreach ($posts as $post)
        <article class="post no-image">
			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gray-1">{{ $post->published_at->format('d/M/Y')}} / {{$post->owner->nombre}}
                            

						</span>
					</div>
					<div class="post-category">
						<span class="category text-capitalize">{{$post->category->nameCategoria}}</span>
					</div>
				</header>
				<h1>{{ $post->title}}</h1>
				<div class="divider"></div>
				<p>{{$post->excerpt}}</p>
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="blogs/{{$post->id}}"class="text-uppercase c-green">Leer Mas</a>
					</div>
					<div class="tags container-flex">
						
					</div>
				</footer>
			</div>
		</article>
 
        @endforeach
       
        
@endsection