<?php

declare(strict_types=1);

namespace App\Users\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Users\Interface\UserRepositoryInterface;
use App\Users\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $model = User::class;
}
