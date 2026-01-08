<?php

namespace App\Providers;

use App\Repositories\Implementations\RoleRepositoryImpl;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleRepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RoleRepository::class,
            RoleRepositoryImpl::class
        );
    }

    public function boot(): void
    {
        //
    }
}
