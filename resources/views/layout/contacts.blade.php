@extends('layout.master')

@section('title', 'Контакты')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание обращения
        </h3>

        @include('layout.errors')

        <form method="post" action="/contacts">
            @csrf
            <div class="mb-3">
                <label for="inputemail" class="form-label">Email </label>
                <input type="text" type="text" class="form-control" id="inputemail"
                       placeholder="Введите ваш Email" name="email">
            </div>
            <div class="mb-3">
                <label for="inputmail" class="form-label">Сообщение </label>
                <textarea rows="4" class="form-control" id="inputmail" placeholder="Введите ваше сообщение" name="mail"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
