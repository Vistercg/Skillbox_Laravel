@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список задач
        </h3>

        @foreach($articles as $article)
            @include('layout.item')
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Назад</a>
            <a class="btn btn-outline-secondary disabled" href="#">Вперед</a>
        </nav>
    </div>
@endsection
