<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SMSServicesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Helpers\TaskCollector', function($app){
            return new \App\Helpers\TaskCollector();
        });
        
        $this->app->bind('\App\Helpers\RecipientCollector', function($app){
            return new \App\Helpers\RecipientCollector();
        });        
        
        $this->app->bind('\App\Helpers\Validator', function($app){
            return new \App\Helpers\Validator();
        });         

        $this->app->bind('\App\Helpers\SMSSender', function($app){
            return new \App\Helpers\SMSSender();
        });   

        $this->app->bind('\App\Helpers\Logger', function($app){
            return new \App\Helpers\Logger();
        });   

        
    }
}
