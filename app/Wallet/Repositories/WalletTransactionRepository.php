<?php

declare(strict_types=1);

namespace App\Wallet\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Wallet\Interfaces\WalletTransactionRepositoryInterface;
use App\Wallet\Models\WalletTransaction;

class WalletTransactionRepository extends BaseRepository implements WalletTransactionRepositoryInterface
{
    protected string $model = WalletTransaction::class;
}
