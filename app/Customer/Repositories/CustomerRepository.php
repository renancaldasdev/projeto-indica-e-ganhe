<?php

declare(strict_types=1);

namespace App\Customer\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Customer\Interfaces\CustomerRepositoryInterface;
use App\Customer\Models\Customer;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    protected string $model = Customer::class;
}
