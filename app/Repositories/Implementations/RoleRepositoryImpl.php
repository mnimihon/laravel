<?php
namespace App\Repositories\Implementations;

use App\Models\Role;
use App\Repositories\RoleRepository;

class RoleRepositoryImpl implements RoleRepository {

    public function __construct(
        private readonly Role $model
    ) {}

    public function getByName(string $name): Role
    {
        return $this->model->where('name', $name)->first();
    }
}
