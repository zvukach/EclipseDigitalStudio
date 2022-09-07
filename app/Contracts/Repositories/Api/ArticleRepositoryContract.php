<?php

namespace App\Contracts\Repositories\Api;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ArticleRepositoryContract
{
    public function getAll(): Collection;

    public function create(array $data): Model;

    public function update(Model $article, array $data): bool;

    public function delete(Model $article): bool;
}
