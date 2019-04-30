<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;

use App\Models\Article;
use App\Observers\ElasticsearchObserver;
use App\Models\ElasticsearchRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ElasticsearchRepository::class, function($app) {
            return new ElasticsearchRepository($app->make(Client::class));            
        });

        $this->app->singleton(Client::class, function($app) {
            return ClientBuilder::create()
                ->setHosts([env('SEARCH_HOST')])
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ElasticsearchObserver::class);
    }
}
