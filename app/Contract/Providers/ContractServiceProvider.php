<?php

declare(strict_types=1);

namespace App\Contract\Providers;

use App\Contract\Interfaces\ContractRepositoryInterface;
use App\Contract\Repositories\ContractRepository;
use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ContractRepositoryInterface::class, ContractRepository::class);
    }
}
