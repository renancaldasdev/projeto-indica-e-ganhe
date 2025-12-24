<?php

declare(strict_types=1);

namespace App\User\Providers;

use App\User\Interfaces\UserRepositoryInterface;
use App\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
