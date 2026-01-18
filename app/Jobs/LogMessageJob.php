<?php

namespace App\Jobs;

use App\DTO\MessageDeletedEventDTO;
use App\Models\LogMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public MessageDeletedEventDTO $data
    ) {}

    public function handle(): void
    {
        LogMessage::create([
            'message_id' => $this->data->messageID,
            'message_text' => $this->data->messageText,
            'user_id' => $this->data->senderID,
            'deleted_by' => $this->data->deletedByID,
            'deleted_at' => $this->data->deletedAt,
        ]);
    }

    public function failed(\Throwable $exception): void
    {
        Log::error('Ошибка лога', ['error' => $exception->getMessage()]);
    }
}
