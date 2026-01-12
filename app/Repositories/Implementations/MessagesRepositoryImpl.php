<?php
namespace App\Repositories\Implementations;

use App\DTO\MessageDTO;
use App\Models\Message;
use App\Repositories\MessagesRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MessagesRepositoryImpl implements MessagesRepository {

    public function __construct(
        private readonly Message $model
    ) {}

    public function getByID(int $id): ?Message
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

    public function create(MessageDTO $dto): Message
    {
        return $this->model->create($dto->toDatabaseArray());
    }

    public function update(Message $message, MessageDTO $dto): Message
    {
        $message->update($dto->toDatabaseArray());
        return $message;
    }

    public function delete(Message $message): bool
    {
        return $message->delete();
    }
}
