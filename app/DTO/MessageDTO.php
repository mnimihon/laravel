<?php

namespace App\DTO;

class MessageDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $conversationId,
        public readonly int $senderId,
        public readonly string $message,
        public readonly bool $isRead,
        public readonly \DateTime $createdAt
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            conversationId: $data['conversation_id'],
            senderId: $data['sender_id'],
            message: $data['message'],
            isRead: (bool) $data['is_read'],
            createdAt: new \DateTime($data['created_at'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'conversation_id' => $this->conversationId,
            'sender_id' => $this->senderId,
            'message' => $this->message,
            'is_read' => $this->isRead,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
        ];
    }

    public function toDatabaseArray(): array
    {
        return [
            'conversation_id' => $this->conversationId,
            'sender_id' => $this->senderId,
            'message' => $this->message,
            'is_read' => $this->isRead,
        ];
    }
}
