<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'title' => __('home.title'),
            'description' => __('home.description'),
        ]);
    }
}
