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
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('static') }}">Статическая страница</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    @yield('body')
</main>

<!-- Footer -->
<footer class="footer mt-5 py-4">
    <div class="container">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. Все права защищены.</p>
        </div>
    </div>
</footer>

@yield('body-bottom')
</body>

</html>
