<?php

declare(strict_types=1);

namespace App\Invoice\Providers;

use App\Invoice\Interfaces\InvoiceRepositoryInterface;
use App\Invoice\Repositories\InvoiceRepository;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }
}
