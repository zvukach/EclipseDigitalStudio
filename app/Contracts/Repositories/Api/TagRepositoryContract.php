<?php

namespace App\Contracts\Repositories\Api;

use Illuminate\Database\Eloquent\Model;

interface TagRepositoryContract
{
    public function firstOrCreate(array $data): Model;
}
