<?php
namespace App\Services\Implementations;

use App\DTO\MessageDTO;
use App\Models\Message;
use App\Repositories\MessagesRepository;
use App\Services\MessagesService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class MessagesServiceImpl implements MessagesService {

    public function __construct(
        private readonly MessagesRepository $repository
    ) {}

    public function getByID(int $id) {
        return $this->repository->getByID($id);
    }

    public function create(MessageDTO $dto): Message
    {
        return $this->repository->create($dto);
    }

    public function updateValidate(Request $request): void
    {
        $request->validate([
            'message' => 'required|string|min:1|max:5000'
        ], [
            'message.required' => 'Поле сообщение обязательно для заполнения',
            'message.min' => 'Сообщение не может быть пустым',
            'message.max' => 'Сообщение не должно превышать 5000 символов'
        ]);
    }

    public function update(Message $message, MessageDTO $dto): Message
    {
        return $this->repository->update($message, $dto);
    }

    public function delete(Message $message): bool
    {
        return $this->repository->delete($message);
    }

    public function getAll(int $limit = 10): Collection
    {
        return $this->repository->getAll($limit);
    }

    public function getAllPaginated(int $limit = 10): LengthAwarePaginator
    {
        return $this->repository->getAllPaginated($limit);
    }
}
