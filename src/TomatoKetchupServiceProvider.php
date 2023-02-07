<?php

namespace TomatoPHP\TomatoKetchup;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoKetchup\Console\TomatoKetchupGenerate;
use TomatoPHP\TomatoKetchup\Facades\Tomato;
use TomatoPHP\TomatoKetchup\Services\Menu;
use TomatoPHP\TomatoKetchup\Services\TomatoCore;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;


class TomatoKetchupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('tomato', function ($app) {
            return new TomatoCore();
        });

        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoKetchup\Console\TomatoKetchupInstall::class,
            TomatoKetchupGenerate::class
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

        TomatoMenuRegister::registerMenu(Menu::class);

    }

    public function boot(): void
    {
        //you boot methods here
    }
}
