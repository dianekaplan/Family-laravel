<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

//    @TODO: added this for example, saving in case I need something like that later (but might not)
    public function boot()
    {
        view()->composer('partials._nav', function($view)
        {
//            $view->with('latest', \App\Update::latest()->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
