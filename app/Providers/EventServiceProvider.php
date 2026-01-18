<?php

namespace App\Providers;

use App\Events\MessageDeleted;
use App\Listeners\ProcessMessageDeletion;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        MessageDeleted::class => [
            ProcessMessageDeletion::class,
        ],
    ];
}
