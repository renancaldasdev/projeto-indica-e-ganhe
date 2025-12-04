<?php

declare(strict_types=1);

namespace App\Base\Repositories;

use App\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected string $model;

    public function save(Model $model): Model
    {
        $model->save();

        return $model;
    }

    public function findById(int $id): Model
    {
        return $this->model::firdOrfail($id);
    }

    public function findAll(): Collection
    {
        return $this->model::all();
    }

    public function deleteById(int $id): void
    {
        $model = $this->findById($id);
        $model->delete();
    }

    public function updateById(int $id, array $data): Model
    {
        $model = $this->findById($id);
        $model->update($data);
        return $model;
    }

    public function totalCount(): int
    {
        return $this->model::query()->count();
    }
}
