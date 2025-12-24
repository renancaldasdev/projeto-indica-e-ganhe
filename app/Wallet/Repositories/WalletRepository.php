<?php

declare(strict_types=1);

namespace App\Wallet\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Wallet\Interfaces\WalletRepositoryInterface;
use App\Wallet\Models\Wallet;

class WalletRepository extends BaseRepository implements WalletRepositoryInterface
{
    protected string $model = Wallet::class;
}
