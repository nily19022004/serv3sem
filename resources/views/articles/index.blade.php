@extends('layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Содержание</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{ $article->datePublic }}</th>
                    <td>
                        <a href="{{ route('article.show', $article->id) }}">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td>{{ $article->desc }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articles->links('pagination::bootstrap-5') }}
@endsection