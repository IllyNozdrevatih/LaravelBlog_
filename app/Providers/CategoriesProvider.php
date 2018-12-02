<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class CategoriesProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.app','blogger.articles.edit','blogger.articles.create'],'App\Http\ViewComposers\CategoriesComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
