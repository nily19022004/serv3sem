@extends('layout')
@section('content')
    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Дата публикации</label>
            <input name="datePublic" type="date" class="form-control" id="" value="{{$article->datePublic}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Заголовок</label>
            <input name="title" type="text" class="form-control" id="" value="{{$article->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <textarea name="desc" class="form-control">{{$article->desc}}</textarea>
        </div>
        <button type="submit" class="btn-solid theme-primary">Сохранить</button>
    </form>

@endsection