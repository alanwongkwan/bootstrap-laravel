@extends('layouts.app')

@section('title', "Статья " . $article->title)

@section('content')
      <article class="main-post blog-list-full-width">
        <div class="featured-post">
          <a href="#" title="">
            <img src='{{ asset("img/$article->img") }}' alt="" />
          </a>
        </div><!-- /.featured-post -->
        <div class="entry-content">
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


@endsection