<?php
namespace App\Services\Implementations;

use App\DTO\UserCreateDTO;
use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserServiceImpl implements UserService {

    public function __construct(
        private readonly UserRepository $repository
    ) {}

    public function create(UserCreateDTO $dto): User
    {
        return $this->repository->create($dto);
    }

    public function update(User $user, UserDTO $dto): User
    {
        return $this->repository->update($user, $dto);
    }

    public function delete(User $user): bool
    {
        return $this->repository->delete($user);
    }

    public function getAll(int $limit = 10): Collection
    {
        return $this->repository->getAll($limit);
    }

    public function getAllPaginated(int $limit): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($limit);
    }


}
