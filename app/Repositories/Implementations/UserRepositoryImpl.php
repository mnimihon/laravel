<?php
namespace App\Repositories\Implementations;

use App\DTO\UserCreateDTO;
use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepositoryImpl implements UserRepository {

    public function __construct(
        private readonly User $model
    ) {}

    public function getByID(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function getAll($limit = 10): Collection
    {
        return $this->model->take($limit)->get();
    }

    public function getAllPaginated($limit = 10): LengthAwarePaginator
    {
        return $this->model->paginate($limit);
    }

    public function create(UserCreateDTO $dto): User
    {
        return $this->model->create($dto->toDatabaseArray());
    }

    public function update(User $user, UserDTO $dto): User
    {
        $user->update($dto->toDatabaseArray());
        return $user;
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
