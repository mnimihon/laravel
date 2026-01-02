<?php
namespace App\Repositories;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    public function getByID(int $id): ?User;
    public function getAll($limit = 10): Collection;
    public function getAllPaginated($limit = 10): LengthAwarePaginator;
    public function create(UserDTO $dto): User;
    public function update(User $user, UserDTO $dto): User;
    public function delete(User $user): bool;
}
