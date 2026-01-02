<?php

namespace App\DTO;

use App\ValueObjects\Email;

class UserDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly Email $email,
        public readonly string $password,
        public readonly string $avatarUrl,
        public readonly \DateTime $createdAt,
        public readonly \DateTime $updatedAt
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            email: new Email($data['email']),
            password: $data['password'],
            avatarUrl: $data['avatar_url'],
            createdAt: new \DateTime($data['created_at']),
            updatedAt: new \DateTime($data['updated_at'])
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email->getValue(),
            'password' => $this->password,
            'avatar_url' => $this->avatarUrl,
            'created_at' => $this->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $this->updatedAt->format('Y-m-d H:i:s'),
        ];
    }

    public function toDatabaseArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email->getValue(),
            'avatar_url' => $this->avatarUrl,
            'password' => $this->password,
        ];
    }
}
