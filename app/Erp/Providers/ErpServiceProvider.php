<?php

declare(strict_types=1);

namespace App\Erp\Providers;

use App\Erp\Interfaces\ErpRepositoryInterface;
use App\Erp\Repositories\ErpRepository;
use Carbon\Laravel\ServiceProvider;

class ErpServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ErpRepositoryInterface::class, ErpRepository::class);
    }
}
