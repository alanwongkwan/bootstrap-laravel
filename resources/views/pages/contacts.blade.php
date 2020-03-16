@extends('layouts.main')

@section('title', 'Контакты')

@section('content')

<h3>Contacts</h3>
<br>
<div class="row flex contact">
    <div class="col-md-4">
        <div class="address-box center">
            <div class="box-content">
                <h2>Адрес</h2>
                <p>291 Proin Road, Lake Charles, Maine 11292</p>
            </div><!-- /.box-content -->
        </div><!-- /.address-box -->
    </div><!-- /.col-md-4 -->
    <div class="col-md-4">
        <div class="address-box center">
            <div class="box-content">
                <h2>Телефон</h2>
                <p>+1 234 800 8080</p>
            </div><!-- /.box-content -->
        </div><!-- /.address-box -->
    </div><!-- /.col-md-4 -->
    <div class="col-md-4">
        <div class="address-box center">
            <div class="box-content">
                <h2>Email:</h2>
                <p>infodeercreative@gmail.com</p>
            </div><!-- /.box-content -->
        </div><!-- /.address-box -->
    </div><!-- /.col-md-4 -->
</div>
<br>

<h3>New Feedback</h3>
            <form method="POST" action="{{ route('page.store') }}">
                @csrf
                <div class="form-group">
                    <label for="titleInput">Ваш email</label>
                <input 
                    type="email"
                    placeholder = "email"
                    class="form-control {{ $errors->has('email') ? 'border-danger' : ''}}" 
                    name="email" 
                    id="titleInput"
                    value="{{ old('email') }}">

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
                        id="bodyInput">{{ old('message') }}</textarea>

                    @if ($errors->has('message'))
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
            @endsection