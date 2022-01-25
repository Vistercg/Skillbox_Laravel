@extends('layout.master')

@section('title', 'Создать статью')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание статьи
        </h3>

        @include('layout.errors')

        <form method="post" action="/articles">
            @csrf
            <div class="mb-3">
                <label for="inputSlug" class="form-label">Символьный код</label>
                <input type="text" type="text" class="form-control" id="inputSlug"
                       placeholder="Уникальный код" name="slug" value="{{ old('slug') }}">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название" name="title"
                       value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="inputShortBody" class="form-label">Краткое описание</label>
                <input type="text" class="form-control" id="inputShortBody" placeholder="Введите описание"
                       name="shortBody" value="{{ old('shortBody') }}">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Детальное описание</label>
                <textarea rows="3" class="form-control" id="inputBody" placeholder="Введите описание"
                          name="body">{{ old('body') }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Опубликовано</label>
            </div>
            <button type="submit" class="btn btn-primary">Создать задачу</button>
        </form>
    </div>
@endsection
