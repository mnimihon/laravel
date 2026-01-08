<?php

namespace App\DTO;

use App\ValueObjects\Email;

class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly Email $email,
        public readonly ?int $id = null,
        public readonly ?string $avatarUrl = null,
        public readonly ?\DateTime $createdAt = null,
        public readonly ?\DateTime $updatedAt = null
    ) {}

    public function toDatabaseArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email->getValue(),
            'avatar_url' => $this->avatarUrl,
        ];
    }
}
