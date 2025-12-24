<?php

declare(strict_types=1);

namespace App\Role\Providers;

use App\Role\Interfaces\RoleRepositoryInterface;
use App\Role\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }
}
