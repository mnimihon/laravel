<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MessagesController;
use \App\Http\Controllers\Admin\UsersController;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    if (auth()->check()) {
        return app(ProfileController::class)->edit($request);
    } else {
        return app(PageController::class)->home();
    }
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return redirect()->route('home');
    });

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::prefix('admin')->group(function () {
        Route::get('/users', [UsersController::class, 'index'])
            ->name('admin.users.index')
            ->middleware('can:view_users');

        Route::get('/users/{id}', [UsersController::class, 'show'])
            ->name('admin.users.show')
            ->middleware('can:view_users');

        Route::get('/messages', [MessagesController::class, 'index'])
            ->name('admin.messages.index')
            ->middleware('can:view_messages');

        Route::get('/messages/{id}', [MessagesController::class, 'show'])
            ->name('admin.messages.show')
            ->middleware('can:view_messages');

        Route::post('/messages/update/{id}', [MessagesController::class, 'update'])
            ->name('admin.messages.update')
            ->middleware('can:edit_messages');

        Route::delete('/messages/delete/{id}', [MessagesController::class, 'delete'])
            ->name('admin.messages.delete')
            ->middleware('can:delete_messages');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
