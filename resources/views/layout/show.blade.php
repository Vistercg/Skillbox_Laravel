@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{$article->title}}
        </h3>
        {{$article->body}}

        <a href="/articles/{{ $article->slug }}/edit">Изменить</a>

        <hr>
        <a href="/">На главную</a>
    </div>
@endsection
