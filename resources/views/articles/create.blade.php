@extends('layout')
@section('content')
    <form action="/article" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Заголовок</label>
            <input name="title" type="text" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <textarea name="desc" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn-solid theme-primary">Сохранить</button>
    </form>

@endsection