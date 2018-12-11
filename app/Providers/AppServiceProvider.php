<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Post::observe(PostObserver::class);

        Schema::defaultStringLength(191);
//        Carbon::setLocale(env('LOCALE', 'pl'));

        if (env('APP_ENV') !== 'local') {
            $url->forceScheme('https');
        }

        Collection::macro('paginate', function (
            $perPage,
            $total = null,
            $page = null,
            $pageName = 'page'
        ) {
            $page =
                $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName
                ]
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
