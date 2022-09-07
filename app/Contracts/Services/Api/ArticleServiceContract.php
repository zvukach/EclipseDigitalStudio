<?php

namespace App\Contracts\Services\Api;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface ArticleServiceContract
{
    public function getAll(): Collection;

    public function create(array $data, array $tags): Model;

    public function update(Model $article, array $data): bool;

    public function delete(Model $article): bool;
}
