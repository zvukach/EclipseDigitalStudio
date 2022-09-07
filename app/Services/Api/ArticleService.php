<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Services\Api\ArticleServiceContract;
use App\Contracts\Repositories\Api\TagRepositoryContract;
use App\Contracts\Repositories\Api\ArticleRepositoryContract;

class ArticleService implements ArticleServiceContract
{
    public function __construct(
        private TagRepositoryContract $tagRepository,
        private ArticleRepositoryContract $articleRepository,
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->articleRepository->getAll();
    }

    public function create(array $data, array $tags): Model
    {
        DB::beginTransaction();
        $newArticle = $this->articleRepository->create($data);
        $this->tagsSynchronizer($newArticle, $tags);

        DB::commit();
        return $newArticle;
    }

    public function update(Model $article, array $data): bool
    {
        DB::beginTransaction();
        if ($success = $this->articleRepository->update($article, $data)) {
            $this->tagsSynchronizer($article, $data['tags']);
            DB::commit();
        } else {
            DB::rollBack();
        }

        return $success;
    }

    public function delete(Model $article): bool
    {
        return $this->articleRepository->delete($article);
    }

    private function tagsSynchronizer(Model $article, array $tags)
    {
        $article->tags()->detach();

        foreach ($tags as $tag) {
            $tag = $this->tagRepository->firstOrCreate($tag);
            $article->tags()->save($tag);
        }
    }
}
