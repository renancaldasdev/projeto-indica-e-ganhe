<?php

declare(strict_types=1);

namespace App\Role\Interfaces;

use App\Base\Interfaces\BaseRepositoryInterface;
use App\Role\Models\Role;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function roleFindBySlug(string $name): ?Role;

}
