<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'title' => 'Главная страница'
        ]);
    }

    public function userProfile()
    {
        return view('pages.user-profile', [
            'title' => 'Профиль пользователя',
            'user' => [
                'name' => 'Иван Иванов',
                'email' => 'ivan@example.com',
                'joined' => '2024-01-15'
            ]
        ]);
    }

    public function register()
    {
        return view('pages.register', [
            'title' => 'Регистрация'
        ]);
    }

    public function staticPage()
    {
        return view('pages.static', [
            'title' => 'Статическая страница'
        ]);
    }
}
