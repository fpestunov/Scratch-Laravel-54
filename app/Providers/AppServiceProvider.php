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
    public function boot()
    {
        // hook on loading 'layouts.sidebar' (see @include('layouts.sidebar') )
        view()->composer('layouts.sidebar', function($view) {
            $view->with('archives', \App\Post::archives());
            // вызов как в контролере
            // return view('posts.index')->with('posts', $posts)
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
