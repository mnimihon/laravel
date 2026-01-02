<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UsersController extends Controller
{
    public function index(UserService $userService)
    {
        $users = $userService->getAllPaginated(10);
        return view('admin.users.index', compact('users'));
    }
}
