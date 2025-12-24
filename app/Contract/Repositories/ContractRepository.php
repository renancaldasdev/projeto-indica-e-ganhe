<?php

declare(strict_types=1);

namespace App\Contract\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Contract\Interfaces\ContractRepositoryInterface;
use App\Contract\Models\Contract;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{
    protected string $model = Contract::class;
}
