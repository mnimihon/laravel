<?php
namespace App\Services;

use App\DTO\MessageDTO;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface MessagesService
{
    public function getByID(int $id);
    public function getAllPaginated(int $limit = 10): LengthAwarePaginator;
    public function updateValidate(Request $request): void;
    public function create(MessageDTO $dto): Message;
    public function update(Message $message, MessageDTO $dto): Message;
    public function delete(Message $message): bool;
}
