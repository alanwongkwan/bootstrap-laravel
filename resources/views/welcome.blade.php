 @extends('layouts.main')

@section('title', 'Главная')

@section('content')
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Все новости
      </h3>

      @forelse ($articles as $article)
      <article class="main-post blog-list-full-width">
        <div class="featured-post">
          <a href="#" title="">
            <img src='{{ asset("img/$article->img") }}' alt="" />
          </a>
        </div><!-- /.featured-post -->
        <div class="entry-content">
          <h2>
            <a href="{{ route('article.show', $article) }}" title="">{{ $article->title }}</a>
          </h2>
          <p>
            {{ $article->excerpt }}
          </p>
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
      <hr>
      @empty
        <p>Its empty, try again!</p>	
    
      @endforelse
      {{ $articles->links() }}
@endsection