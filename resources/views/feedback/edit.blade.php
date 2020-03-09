@extends('layouts.app')

@section('title', 'Изменить отзыв')

@section('content')

<h3>Изменить отзыв</h3>
<form method="POST" action="{{ route('feedback.update', $feedback) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titleInput">Ваш email</label>
    <input 
        type="email"
        placeholder = "email"
        class="form-control {{ $errors->has('email') ? 'border-danger' : ''}}" 
        name="email" 
        id="titleInput"
        value="{{ $feedback->email }}">

    @if ($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
    </div>

    <div class="form-group">
        <label for="bodyInput">Сообщение</label>
        <textarea 
            rows="3"
            placeholder = "message"
            class="form-control {{ $errors->has('message') ? 'border-danger' : ''}}" 
            name="message" 
            id="bodyInput">{{ $feedback->message }}</textarea>

        @if ($errors->has('message'))
            <p class="text-danger">{{ $errors->first('message') }}</p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
@endsection