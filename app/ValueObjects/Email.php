<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class Email
{
    private string $value;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Неверный адрес электронной почты');
        }

        $this->value = trim($email);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
