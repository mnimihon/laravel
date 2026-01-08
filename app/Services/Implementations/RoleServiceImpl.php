<?php
namespace App\Services\Implementations;

use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Services\RoleService;

class RoleServiceImpl implements RoleService {

    public function __construct(
        private readonly RoleRepository $repository
    ) {}

    public function getByName(string $name): Role
    {
        return $this->repository->getByName($name);
    }
}
