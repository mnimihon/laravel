<?php

namespace App\Listeners;

use App\Events\MessageDeleted;
use App\Jobs\LogMessageJob;
use App\Jobs\SendTelegramJob;
use Illuminate\Support\Facades\Log;

class ProcessMessageDeletion
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageDeleted $event): void
    {
        SendTelegramJob::dispatch($event->data)
            ->onQueue('telegram');

        LogMessageJob::dispatch($event->data)
            ->onQueue('logs');
    }
}
