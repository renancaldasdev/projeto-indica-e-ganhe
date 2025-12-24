<?php

declare(strict_types=1);

namespace App\Customer\Providers;

use App\Customer\Interfaces\CustomerClientRepositoryInterface;
use App\Customer\Interfaces\CustomerErpRepositoryInterface;
use App\Customer\Interfaces\CustomerRepositoryInterface;
use App\Customer\Repositories\CustomerClientRepository;
use App\Customer\Repositories\CustomerErpRepository;
use App\Customer\Repositories\CustomerRepository;
use Illuminate\Support\ServiceProvider;

class CustomerProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerErpRepositoryInterface::class, CustomerErpRepository::class);
        $this->app->bind(CustomerClientRepositoryInterface::class, CustomerClientRepository::class);
    }
}
