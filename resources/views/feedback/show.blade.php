@extends('layouts.app')

@section('title', "Отзыв " . $feedback->id)

@section('content')


      <h4>Подробный отзыв</h4>
      <article class="main-post blog-list-full-width">
        <div class="entry-content">
          <p>Отзыв от 
            {{ $feedback->email }}
          </p>
          {{-- сейчас тело отзыва вывожу с костылем. В базе текст с тегами, надо решить как это обойти --}}
          <p>Текст отзыва</p>
          <div>
            {!! $feedback->message !!}
          </div>
          
        </div><!-- /.entry-content -->
        <ul class="list-inline">
          <li class="list-inline-item">
              дата
            <i class="fa fa-calendar"></i> {{ date('d.m.Y', time($feedback->created_at)) }}
          </li>
        </ul>
      </article>
      <a href="{{ route('page.feedback') }}">вернуться</a>


@endsection