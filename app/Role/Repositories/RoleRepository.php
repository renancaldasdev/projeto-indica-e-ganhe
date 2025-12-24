<?php

declare(strict_types=1);

namespace App\Role\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Role\Interfaces\RoleRepositoryInterface;
use App\Role\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected string $model = Role::class;
}
