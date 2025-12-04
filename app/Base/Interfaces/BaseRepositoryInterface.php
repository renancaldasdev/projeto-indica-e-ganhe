<?php

declare(strict_types=1);

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function save(Model $model): Model;

    public function findById(int $id): Model;

    public function findAll(): Collection;

    public function deleteById(int $id): void;

    public function updateById(int $id, array $data): Model;

    public function totalCount(): int;
}
