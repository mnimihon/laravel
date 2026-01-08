<?php

namespace App\Gates;

use App\Models\User;
use App\Models\Role;

class UserGates
{
    public function isAdmin(User $user): bool
    {
        return $user->role && $user->role->name === Role::ADMIN;
    }

    public function isManager(User $user): bool
    {
        return $user->role && $user->role->name === Role::MANAGER;
    }

    public function isUser(User $user): bool
    {
        return $user->role && $user->role->name === Role::USER;
    }

    public function isAdminOrisManager(User $user)
    {
        return $this->isAdmin($user) || $this->isManager($user);
    }
}
