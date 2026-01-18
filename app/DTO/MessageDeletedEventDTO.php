<?php

namespace App\DTO;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class MessageDeletedEventDTO
{
    public function __construct(
        public readonly int $messageID,
        public readonly string $messageText,
        public readonly int $senderID,
        public readonly string $senderName,
        public readonly int $deletedByID,
        public readonly string $deletedByName,
        public readonly string $deletedAt
    ) {}

    public static function fromModels(Message $message, Authenticatable $deletedBy): self {
        return new self(
            messageID: $message->id,
            messageText: $message->message,
            senderID: $message->sender_id,
            senderName: $message->user->name,
            deletedByID: $deletedBy->id,
            deletedByName: $deletedBy->name,
            deletedAt: now()->format('Y-m-d H:i:s')
        );
    }

    public function toArray(): array
    {
        return [
            'message_id' => $this->messageID,
            'message_text' => $this->messageText,
            'sender_id' => $this->senderID,
            'sender_name' => $this->senderName,
            'deleted_by_id' => $this->deletedByID,
            'deleted_by_name' => $this->deletedByName,
            'deleted_at' => $this->deletedAt,
        ];
    }
}
