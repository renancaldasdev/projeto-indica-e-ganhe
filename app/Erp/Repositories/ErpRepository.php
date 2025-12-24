<?php

declare(strict_types=1);

namespace App\Erp\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Erp\Interfaces\ErpRepositoryInterface;
use App\Erp\Models\Erp;

class ErpRepository extends BaseRepository implements ErpRepositoryInterface
{
    protected string $modelClass = Erp::class;
}
