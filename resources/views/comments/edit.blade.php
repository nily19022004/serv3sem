@extends('layout')
@section('content')
    <form action="/comment/{{ $comment->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Комментарий</label>
            <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
        </div>
        <button type="submit" class="btn-solid theme-primary">Сохранить</button>
    </form>
@endsection