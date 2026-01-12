<?php

namespace App\Providers;

use App\Models\Message;
use App\Policies\MessagePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Message::class => MessagePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
