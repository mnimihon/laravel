<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\MessagesController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/user/profile', [PageController::class, 'userProfile'])->name('profile');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/static-page', [PageController::class, 'staticPage'])->name('static');

Route::prefix('admin')->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('admin.users.show');
    Route::get('/messages', [MessagesController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('admin.messages.show');
    Route::post('/messages/update/{id}', [MessagesController::class, 'update'])->name('admin.messages.update');
    Route::delete('/messages/delete/{id}', [MessagesController::class, 'delete'])->name('admin.messages.delete');
});
