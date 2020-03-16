@extends('layouts.main')

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

      <div>
        <a href="{{ route('feedback.edit', $feedback) }}" type="button" class="btn btn-warning">изменить отзыв</a>
      </div>
      
      <br>
      <form method="POST" action="{{ route('feedback.destroy', $feedback) }}">
        @csrf
        @method('delete')
        <button id = "deleted2" type="submit" class="btn btn-danger">Удалить отзыв</button>
      </form>

      <script>
        let button = document.querySelector("#deleted2");
        button.addEventListener("click", function() {
         let del = confirm('Уверены? Это не обратимый процес!!!');
         if (del === false) {
          event.preventDefault();
         }
        });
      </script>

      <a href="{{ route('page.feedback') }}">все отзывы</a>


@endsection