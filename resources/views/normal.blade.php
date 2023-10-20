@extends('layouts.consumidor')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('En este perfil como consumidor se podra navegar de acuerdo a los contenidos por categoria.
                        En el menu se podra encontrar el cambio de perfil a creador, donde podras acceder a multiples funciones como Creacion de Posts
                        y Transmisiones en Vivo (Livestreaming).') }}
                </div>
                @auth
                <!--buscar el router para poder poner la principal la cual tendra acceso el usuario
                <a href="{{ url('/principal') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">CONTINUAR</a>-->
                @endauth
               
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-10 col-md-12"> 
            <nav class="text-center my-5">
            <a href="{{route ('home')}}" class="btn btn-warning {{isset($categoryIdSelected)?'': 'select-category'}}">Todos</a>
                @foreach ($categories as $category)
                <a href="{{route ('posts.category', $category->nameCategoria)}}" class="btn btn-default {{(isset($categoryIdSelected)&&$category->id==$categoryIdSelected)? 'selected-category':''}}">{{$category->nameCategoria}}</a>
               
                @endforeach
               
            </nav>
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
						@forelse($post->tags as $tag)
						<span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>
						@empty
                         <em>sin etiqueta</em>
                        @endforelse
					</div>
				</footer>
			</div>
		</article>
 
        @endforeach
       
    

    


</div>
@endsection
    