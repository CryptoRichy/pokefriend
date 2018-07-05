<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        // View::composer(
        //     'index', 'App\Http\ViewComposers\TopnavComposer'
        // );

        View::composer(
            '*', 'App\Http\ViewComposers\ActiveLinkComposer'
        );

        // // Using Closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });

        View::composer('*', function ($view) {
            
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}