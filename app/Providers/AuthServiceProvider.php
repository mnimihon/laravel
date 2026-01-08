<?php

namespace App\Providers;

use App\Gates\UserGates;
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

        $gates = new UserGates();

        Gate::define('is-admin', fn($user) => $gates->isAdmin($user));
        Gate::define('is-manager', fn($user) => $gates->isManager($user));
        Gate::define('is-user', fn($user) => $gates->isUser($user));
        Gate::define('is-admin-manager', fn($user) => $gates->isAdminOrisManager($user));
    }
}
