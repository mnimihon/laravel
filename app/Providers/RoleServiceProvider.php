<?php

namespace App\Providers;

use App\Services\RoleService;
use App\Services\Implementations\RoleServiceImpl;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RoleService::class,
            RoleServiceImpl::class
        );
    }

    public function boot(): void
    {
        //
    }
}
