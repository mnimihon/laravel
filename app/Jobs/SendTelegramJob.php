<?php

namespace App\Jobs;

use App\DTO\MessageDeletedEventDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendTelegramJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public MessageDeletedEventDTO $data
    ) {}

    public function handle(): void
    {
        $text = "Сообщение удалено\n"
            . "ID: {$this->data->messageID}\n"
            . "От: {$this->data->senderName}\n"
            . "Текст: " . $this->data->messageText . "\n"
            . "Удалил: {$this->data->deletedByName}\n"
            . "Время: {$this->data->deletedAt}";

        Http::post('https://api.telegram.org/bot' . config('services.telegram.bot_token') . '/sendMessage', [
            'chat_id' => config('services.telegram.admin_chat_id'),
            'text' => $text,
            'parse_mode' => 'HTML'
        ]);
    }

    public function failed(\Throwable $exception): void
    {
        Log::error('Ошибка телеграм очереди', ['error' => $exception->getMessage()]);
    }
}
