@extends('layout')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Текст</th>
                <th>Статья</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->article->title ?? '—' }}</td>
                    <td>
                        <a href="/comment/{{ $comment->id }}/edit" class="btn btn-link">Редактировать</a>
                        <form action="/comment/{{ $comment->id }}" method="post" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-link" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $comments->links('pagination::bootstrap-5') }}
@endsection