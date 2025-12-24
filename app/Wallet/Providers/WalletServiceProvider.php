<?php

declare (strict_types=1);

namespace App\Wallet\Providers;

use App\Wallet\Interfaces\WalletRepositoryInterface;
use App\Wallet\Interfaces\WalletTransactionRepositoryInterface;
use App\Wallet\Repositories\WalletRepository;
use App\Wallet\Repositories\WalletTransactionRepository;
use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
        $this->app->bind(WalletTransactionRepositoryInterface::class, WalletTransactionRepository::class);
    }
}
