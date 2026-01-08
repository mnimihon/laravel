<?php

namespace App\Services;

use App\Models\Role;

interface RoleService
{
    public function getByName(string $name): Role;
}
