@extends('layouts.app')

@section('title', 'Создать статью')

@section('content')

<h3>Create New Article</h3>
            <form method="POST" action="{{ route('article.store') }}">
                @csrf
                <div class="form-group">
                    <label for="titleInput">Заголовок статьи</label>
                <input 
                    type="text"
                    placeholder = "title"
                    class="form-control {{ $errors->has('title') ? 'border-danger' : ''}}" 
                    name="title" 
                    id="titleInput"
                    value="{{ old('title') }}">

                @if ($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
                </div>

                <div class="form-group">
                    <label for="titleInput">Малое изображение</label>
                <input 
                    type="text"
                    placeholder = "thumbnail"
                    class="form-control {{ $errors->has('thumbnail') ? 'border-danger' : ''}}" 
                    name="thumbnail" 
                    id="titleInput"
                    value="{{ old('thumbnail') }}">

                @if ($errors->has('thumbnail'))
                    <p class="text-danger">{{ $errors->first('thumbnail') }}</p>
                @endif
                </div>

                <div class="form-group">
                    <label for="imgInput">Большое изображение</label>
                    <input 
                        type="text" 
                        placeholder = "img"
                        class="form-control @error('img') border-danger @enderror" 
                        name="img" 
                        id="imgInput"
                        value="{{ old('img') }}">

                    @error('img')
                        <p class="text-danger">{{ $errors->first('img') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="excerptInput">Превью текст</label>
                    <textarea 
                        rows="3"
                        placeholder = "excerpt"
                        class="form-control {{ $errors->has('excerpt') ? 'border-danger' : ''}}" 
                        name="excerpt" 
                        id="excerptInput">{{ old('excerpt') }}</textarea>

                    @if ($errors->has('excerpt'))
                        <p class="text-danger">{{ $errors->first('excerpt') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="bodyInput">Текст статьи</label>
                    <textarea 
                        rows="3"
                        placeholder = "body"
                        class="form-control {{ $errors->has('body') ? 'border-danger' : ''}}" 
                        name="body" 
                        id="bodyInput">{{ old('body') }}</textarea>

                    @if ($errors->has('body'))
                        <p class="text-danger">{{ $errors->first('body') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="imgInput">Тэги</label>
                    
                    <select name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            
                        @endforeach
                    </select>

                    @if ($errors->has('tags'))
                        <p class="text-danger">{{ $message }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
            @endsection