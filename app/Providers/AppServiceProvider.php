<?php

namespace App\Providers;

use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsSourceQueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use App\Service\Contracts\Social;
use App\Service\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsSourceQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UsersQueryBuilder::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
    }
}
