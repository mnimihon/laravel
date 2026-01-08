<?php
namespace App\Repositories;


use App\Models\Role;

interface RoleRepository
{
    public function getByName(string $name): Role;
}
