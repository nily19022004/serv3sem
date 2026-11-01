@extends('layout')
@section('content')
    <h3>
        Контакты
    </h3>
    <p>
        Имя: {{$contact['name'] }}
    </p>
    <p>
        Адрес: {{$contact['adres'] }}
    </p>
    <p>
        Телефон: {{$contact['phone'] }}
    </p>
    <p>
        Email: {{$contact['email'] }}
    </p>
@endsection