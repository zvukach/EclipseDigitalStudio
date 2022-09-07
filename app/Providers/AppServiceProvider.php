<?php

namespace App\Providers;

use App\Services\Api\ArticleService;
use App\Repository\Api\TagRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Api\ArticleRepository;
use App\Contracts\Services\Api\ArticleServiceContract;
use App\Contracts\Repositories\Api\TagRepositoryContract;
use App\Contracts\Repositories\Api\ArticleRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TagRepositoryContract::class, TagRepository::class);
        $this->app->singleton(ArticleServiceContract::class, ArticleService::class);
        $this->app->singleton(ArticleRepositoryContract::class, ArticleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
