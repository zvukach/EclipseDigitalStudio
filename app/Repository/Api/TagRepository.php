<?php

namespace App\Repository\Api;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\Api\TagRepositoryContract;

class TagRepository implements TagRepositoryContract
{
    public function __construct(private Tag $model)
    {
    }

    public function firstOrCreate(array $data): Model
    {
        return $this->model->firstOrCreate($data);
    }
}
