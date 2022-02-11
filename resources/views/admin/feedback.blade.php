@extends('layout.without_sidebar')

@section('title', 'Список обращений')

@section('content')

    <table class="table table-bordered align-middle">
        <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Cообщение</th>
            <th scope="col">Дата получения</th>
        </tr>
        </thead>
        <tbody>

        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->email}}</td>
                <td>{{$contact->mail}}</td>
                <td>{{$contact->created_at}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
