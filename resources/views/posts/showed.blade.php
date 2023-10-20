@extends('layouts.consumidor')

@section('content')


<!-- VISTA DE LECTURA PARA NORMAL -->

  <div class="row justify-content-center">
        <div class="col-10 col-md-12">

  <article class="post image-w-text container">

<div class="content-post">
  <header class="container-flex space-between">
    <div class="date">
      <span class="c-gris">{{ $posts->published_at->format('M d y')}} / {{$posts->owner->nombre}}

      </span>
    </div>
    <div class="post-category">
      <span class="category">
        <a href="{{route('categories.ver', $posts->category)}}">{{$posts->category->nameCategoria}}</a></span>
    </div>
  </header>
  <h1>{{$posts->title}}</h1>
    <div class="divider"></div>
    <div class="image-w-text">
      {!! $posts->body!!}
    </div>

    <footer class="container-flex space-between">
      
    <div class="tags container-flex">
        @forelse ($posts->tags as $tag)
        <span class="tag c-gray-1 text-capitalize"><a href="{{route('tags.show', $tag)}}">#{{ $tag->name }}</a></span>
        @empty
          <em>sin etiqueta</em>
          @endforelse
      </div>
  </footer>
</div>

</article>

<h4>Sala de Comentarios</h4>
  
                    @include('posts.commentsDisplay', ['comments' => $posts->comments, 'post_id' => $posts->id])
   
                    <hr />
                    <h4>Agregar Comentario</h4>
                    
                    <form method="post" action="{{ route('comments.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Agrega" />
                        </div>
                    </form>
</div>


				

@endsection