<?php

namespace Tomatophp\TomatoKetchup;

use Illuminate\Support\ServiceProvider;


class TomatoKetchupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \Tomatophp\TomatoKetchup\Console\TomatoKetchupInstall::class,
        ]);
 
        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-ketchup.php', 'tomato-ketchup');
 
        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-ketchup.php' => config_path('tomato-ketchup.php'),
        ], 'tomato-ketchup-config');
 
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
 
        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-ketchup-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-ketchup');
 
        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-ketchup'),
        ], 'tomato-ketchup-views');
 
        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-ketchup');
 
        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-ketchup'),
        ], 'tomato-ketchup-lang');
 
        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
 
    }

    public function boot(): void
    {
        //you boot methods here
    }
}
