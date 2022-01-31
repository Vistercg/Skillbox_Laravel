@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{$article->title}}
        </h3>

        @include('layout.tags', ['tags' => $article->tags])

        {{$article->body}}

        @if($article->steps->isNotEmpty())
            <ul class="list-group">
                @foreach($article->steps as $step)
                    <li class="list-group-item">
                        <form method="POST" action="/steps/{{ $step->id }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-check">
                                <label class="form-check-label {{ $step->completed ? 'completed' : ''}}">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="completed"
                                           onclick="this.form.submit()"
                                        {{ $step->completed ? 'checked' : '' }}
                                    >
                                    {{ $step->description }}
                                </label>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <form class="card card-body mb-4" method="POST" action="/articles/{{ $article->slug }}/steps">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control"
                       placeholder="Шаг" value="{{ old('description') }}"
                       name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

        @include('layout.errors')
        <a href="/articles/{{ $article->slug }}/edit">Изменить</a>

        <hr>
        <a href="/">На главную</a>
    </div>
@endsection
