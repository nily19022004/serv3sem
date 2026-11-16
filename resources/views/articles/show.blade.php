@extends('layout')
@section('content')
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->desc }}</p>
            <p class="text-muted">Дата публикации: {{ $article->datePublic }}</p>
            <div class="btn-group" role="group">
                <a href="/article/{{ $article->id }}/edit" class="btn btn-link">Редактировать</a>
                <form action="/article/{{ $article->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-link" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <h4>Комментарии</h4>

    @forelse ($article->comments as $comment)
        <div class="card mb-2" style="width: 38rem;">
            <div class="card-body">
                <p class="card-text">{{ $comment->body }}</p>
                <a href="/comment/{{ $comment->id }}/edit" class="btn btn-link">Редактировать</a>
                <form action="/comment/{{ $comment->id }}" method="post" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-link" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    @empty
        <p>Комментариев пока нет.</p>
    @endforelse

    <a href="/comment/create?article_id={{ $article->id }}" class="btn btn-primary mt-3">Добавить комментарий</a>
@endsection