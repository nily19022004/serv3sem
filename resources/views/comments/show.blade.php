@extends('layout')
@section('content')
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <p class="card-text">{{ $comment->body }}</p>
            <p class="text-muted">Автор: {{ $comment->user->name ?? '—' }}</p>
            <p class="text-muted">Статья: {{ $comment->article->title ?? '—' }}</p>

            @can('updateComment', $comment)
                <a href="/comment/{{ $comment->id }}/edit" class="btn btn-link">Редактировать</a>
            @endcan
            @can('deleteComment', $comment)
                <form action="/comment/{{ $comment->id }}" method="post" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-link" type="submit">Удалить</button>
                </form>
            @endcan
        </div>
    </div>
@endsection