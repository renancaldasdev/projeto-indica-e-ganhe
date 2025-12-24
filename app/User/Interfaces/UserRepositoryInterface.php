<?php

declare(strict_types=1);

namespace App\User\Interfaces;

use App\Base\Interfaces\BaseRepositoryInterface;
use App\User\Models\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findUserByEmail(string $email): ?User;
}
