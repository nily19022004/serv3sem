<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Меню</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/about">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Контакты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/article">Статьи</a>
                        </li>
                        @can('moderateComments')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('comment.pending') }}">Модерация</a>
                            </li>
                        @endcan
                        @can('article')
                            <li class="nav-item">
                                <a class="nav-link" href="/article/create">Создать статью</a>
                            </li>
                        @endcan
                    </ul>

                </div>
                <div class="navbar-nav d-flex justify-content-end">
                    @guest
                        <div class="nav-item">
                            <a class="nav-link" href="/auth/create">Регистрация</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link" href="/auth/login">Войти</a>
                        </div>
                    @endguest
                    @auth
                        <!-- Блок уведомлений -->
                        @php
                            // Берем только непрочитанные уведомления текущего пользователя
                            $notifications = auth()->user()->unreadNotifications;
                        @endphp

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Уведомления
                                @if($notifications->count() > 0)
                                    <span class="badge bg-danger">{{ $notifications->count() }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @forelse($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('notification.read', $notification->id) }}">
                                            {{ $notification->data['title'] }}
                                        </a>
                                    </li>
                                @empty
                                    <li><span class="dropdown-item text-muted">Нет новых уведомлений</span></li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="nav-item">
                            <a class="nav-link" href="/auth/logout">Выход</a>
                        </div>
                    @endauth
                </div>
            </div>

        </nav>
    </header>
    <main class="flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer class="text-center py-3 bg-light mt-auto">
        <p class="mb-0">Исматова Нилуфар Гиёсиддиновна, группа 251-3210</p>
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>