@extends('layouts.consumidor')

@section('content')
<div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">@if (isset($title))
	<h1>{{$title}}</h1>
@endif</h3>
</div>
	<section class="posts container"> 
	

	<!-- cada pots debe aparece en cada ventada de acuerdo a su tema -->
		@foreach($posts as $post) <!--recorre todos los posts como un post-->
		<article class="post no-image">
			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gray-1">{{ $post->published_at->format('M d y')}} / {{$post->owner->nombre}}

						</span><!--diffForHumans-->
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
						@forelse ($post->tags as $tag)
						<span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>
						@empty
              				<em>sin etiqueta</em>
              			@endforelse
						
					</div>
				</footer>
			</div>
		</article>
		@endforeach

	</section><!-- fin del div.posts.container -->

	<div class="pagination">
		<ul class="list-unstyled container-flex space-center">
			<li><a href="#" class="pagination-active">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
		</ul>
	</div>

	<!-- <section class="footer">
		<footer>
			
		</footer>
	</section> -->
@endsection