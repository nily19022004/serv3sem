@extends('layout')
@section('content')
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <p class="card-text">{{ $comment->body }}</p>
            <p class="text-muted">Статья: {{ $comment->article->title ?? '—' }}</p>
            <a href="/comment/{{ $comment->id }}/edit" class="btn btn-link">Редактировать</a>
            <form action="/comment/{{ $comment->id }}" method="post" style="display:inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-link" type="submit">Удалить</button>
            </form>
        </div>
    </div>
@endsection