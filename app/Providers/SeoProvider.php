<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ServiceContainer\MetaGenerator;
class SeoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('seogenerator',function(){
            return new MetaGenerator();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
