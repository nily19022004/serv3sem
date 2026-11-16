@extends('layout')
@section('content')
    <h3>Новый комментарий к статье "{{ $article->title }}"</h3>
    <form action="/comment" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <div class="mb-3">
            <label class="form-label">Комментарий</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn-solid theme-primary">Сохранить</button>
    </form>
@endsection