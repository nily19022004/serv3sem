@extends('layout')
@section('content')
    <form action="/auth/signUp" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Имя</label>
            <input name="name" type="text" class="form-control" id="" placeholder="Введите имя">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email-почта</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Мы никогда не передадим вашу электронную почту кому-либо еще.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-field">
            <input type="checkbox" id="exampleCheck1" class="check">
            <label for="exampleCheck1">Показать пароль</label>
        </div>
        <button type="submit" class="btn-solid theme-primary">Зарегистрироваться</button>
    </form>

@endsection