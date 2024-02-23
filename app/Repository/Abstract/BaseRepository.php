<?php

declare(strict_types=1);

namespace App\Repository\Abstract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(
        protected Model $model,
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?Model
    {
        return $this->model::find($id);
    }

    public function findByIds(array $ids = []): Collection
    {
        return $this->model::whereIn('id', $ids)->get();
    }
}
