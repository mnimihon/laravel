<?php

namespace App\Events;

use App\DTO\MessageDeletedEventDTO;
use Illuminate\Foundation\Events\Dispatchable;

class MessageDeleted
{
    use Dispatchable;

    public function __construct(
        public readonly MessageDeletedEventDTO $data
    ) {}
}
