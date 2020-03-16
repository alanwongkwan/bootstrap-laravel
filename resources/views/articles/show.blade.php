@extends('layouts.main')

@section('title', "Статья " . $article->title)

@section('content')
      <article class="main-post blog-list-full-width">
        <div class="featured-post">
          <a href="#" title="">
            <img src='{{ asset("img/$article->img") }}' alt="" />
          </a>
        </div><!-- /.featured-post -->
        <div class="entry-content">
          <p>Теги статьи</p>
          @foreach ($article->tags as $tag)
        <a class="text-info" href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>,
          @endforeach
          <h2>
            {{ $article->title }}
          </h2>
          {{-- сейчас тело статьи вывожу с костылем. В базе текст с тегами, надо решить как это обойти --}}
          <div>
            {!! $article->body !!}
          </div>
          
        </div><!-- /.entry-content -->
        <ul class="list-inline">
          <li class="list-inline-item">
            <i class="fa fa-calendar"></i> {{ date('d.m.Y', time($article->created_at)) }}
          </li>
          <li class="list-inline-item">
            <i class="fa fa-eye"></i> 55
          </li>
          <li class="list-inline-item">
            <i class="fa fa-comment"></i> 12
          </li>
        </ul>
      </article>
      <div>
        <a href="{{ route('article.edit', $article) }}" type="button" class="btn btn-warning">изменить статью</a>
      </div>
      
      <br>
      <form method="POST" action="{{ route('article.destroy', $article) }}">
        @csrf
        @method('delete')
        <button id = "deleted" type="submit" class="btn btn-danger">Удалить статью</button>
      </form>

      <script>
        let button = document.querySelector("#deleted");
        button.addEventListener("click", function() {
         let del = confirm('Уверены? Это не обратимый процес!!!');
         if (del === false) {
          event.preventDefault();
         }
        });
      </script>

      
@endsection