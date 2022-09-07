<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\ArticleCreate;
use App\Http\Requests\Api\Articles\ArticleUpdate;
use App\Contracts\Services\Api\ArticleServiceContract;

class ArticlesController extends Controller
{
    public function __construct(private ArticleServiceContract $articleService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return new JsonResponse($this->articleService->getAll()->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(ArticleCreate $request): JsonResponse
    {
        $data = [
            'title'         => $request->input('title'),
            'description'   => $request->input('description')
        ];

        return new JsonResponse([
            'success' => true,
            'data' => $this->articleService->create($data, $request->input('tags')),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleUpdate $request
     * @param Article $article
     * @return JsonResponse
     */
    public function update(ArticleUpdate $request, Article $article): JsonResponse
    {
        return new JsonResponse([
            'success' => $this->articleService->update($article, $request->toArray()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        return new JsonResponse([
            'success' =>  $this->articleService->delete($article),
        ]);
    }
}
