<?php

namespace App\Providers;

use App\Contract\BookRepositoryInterface;
use App\Entities\Book;
use App\Repository\BookRepository;
use Illuminate\Http\Resources\Json\JsonResource;
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
        $this->app->bind(BookRepositoryInterface::class, function($app) {
            return new BookRepository(
                $app['em'],
                $app['em']->getClassMetaData(Book::class)
            );
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
