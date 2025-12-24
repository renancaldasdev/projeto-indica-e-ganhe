<?php

declare(strict_types=1);

namespace App\Customer\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Customer\Interfaces\CustomerRepositoryInterface;
use App\Customer\Models\CustomerErp;

class CustomerErpRepository extends BaseRepository implements CustomerRepositoryInterface
{
    protected string $model = CustomerErp::class;
}
