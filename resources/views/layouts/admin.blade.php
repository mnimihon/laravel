<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', config('app.name'))</title>

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        @yield('head')
        @yield('head-bottom')
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.messages.index') }}">Сообщения</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main-content">
            @yield('body')
        </main>
    </body>
</html>
