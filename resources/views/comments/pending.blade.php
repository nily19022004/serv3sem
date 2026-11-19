@extends('layout')
@section('content')
    <h3>Комментарии на модерации</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @forelse ($comments as $comment)
        <div class="card mb-2" style="width: 38rem;">
            <div class="card-body">
                <p class="card-text">{{ $comment->body }}</p>
                <p class="text-muted mb-1">
                    Автор: {{ $comment->user->name ?? '—' }}<br>
                    Статья: {{ $comment->article->title ?? '—' }}
                </p>

                <form action="{{ route('comment.approve', $comment->id) }}" method="post" style="display:inline">
                    @csrf
                    <button class="btn btn-success" type="submit">Принять</button>
                </form>

                <form action="{{ route('comment.reject', $comment->id) }}" method="post" style="display:inline">
                    @csrf
                    <button class="btn btn-danger" type="submit">Отклонить</button>
                </form>
            </div>
        </div>
    @empty
        <p>Нет комментариев, ожидающих модерации.</p>
    @endforelse

    {{ $comments->links('pagination::bootstrap-5') }}
@endsection