<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/user/profile', [PageController::class, 'userProfile'])->name('profile');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/static-page', [PageController::class, 'staticPage'])->name('static');
