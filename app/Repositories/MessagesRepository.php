<?php
namespace App\Repositories;

use App\DTO\MessageDTO;
use App\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface MessagesRepository
{
    public function getByID(int $id): ?Message;
    public function getAll($limit = 10): Collection;
    public function getAllPaginated($limit = 10): LengthAwarePaginator;
    public function create(MessageDTO $dto): Message;
    public function update(Message $message, MessageDTO $dto): Message;
    public function delete(Message $message): bool;
}
