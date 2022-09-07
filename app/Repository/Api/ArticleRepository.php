<?php

namespace App\Repository\Api;

use App\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\Api\ArticleRepositoryContract;

class ArticleRepository implements ArticleRepositoryContract
{
    public function __construct(private Article $model)
    {
    }

    public function getAll(): Collection
    {
        return $this->model->with('tags')->get();
    }

    public function create(array $data): Model
    {
         return $this->model->newQuery()->create($data);
    }

    public function update(Model $article, array $data): bool
    {
        return $article->fill($data)->update();
    }

    public function delete(Model $article): bool
    {
        return $article->delete();
    }
}
