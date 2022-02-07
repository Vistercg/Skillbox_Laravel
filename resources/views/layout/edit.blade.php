@extends('layout.master')

@section('title', 'Редактирвоание статьи')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Редактирование статьи
        </h3>

        @include('layout.errors')

        <form method="post" action="/articles/{{ $article->slug }}">

            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="inputSlug" class="form-label">Символьный код</label>
                <input type="text" type="text" class="form-control" id="inputSlug"
                       name="slug" value="{{ old('slug', $article->slug) }}">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" name="title"
                       value="{{ old('title', $article->title) }}">
            </div>
            <div class="mb-3">
                <label for="inputShortBody" class="form-label">Краткое описание</label>
                <input type="text" class="form-control" id="inputShortBody" name="shortBody"
                       value="{{ old('shortBody', $article->shortBody) }}">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Детальное описание</label>
                <textarea rows="3" class="form-control" id="inputBody"
                          name="body">{{ old('body', $article->body) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="inputTags" class="form-label">Тэги</label>
                <input type="text" class="form-control" id="inputTags" name="tags"
                       value="{{ old('tags', $article->tags->pluck('name'))->implode(',') }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Изменить</label>
            </div>
            <button type="submit" class="btn btn-primary">Изменить задачу</button>
        </form>

        <form method="POST" action="/articles/{{ $article->slug }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="display: block; margin-left: auto;">Удалить</button>
        </form>

    </div>
@endsection
