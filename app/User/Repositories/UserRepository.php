<?php

declare(strict_types=1);

namespace App\User\Repositories;

use App\Base\Repositories\BaseRepository;
use App\User\Interface\UserRepositoryInterface;
use App\User\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $model = User::class;
}
