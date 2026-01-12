<?php

namespace App\DTO;

use App\ValueObjects\Email;

class UserCreateDTO
{
    public function __construct(
        public readonly string $name,
        public readonly Email $email,
        public readonly string $password,
    ) {}

    public function toDatabaseArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email->getValue(),
            'password' => $this->password,
        ];
    }
}
