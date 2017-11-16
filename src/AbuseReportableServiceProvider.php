<?php

namespace Lifeids\AbuseReportable;

use Illuminate\Support\ServiceProvider;

class AbuseReportableServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    $this->publishes([
	        __DIR__.'/../database/migrations/' => database_path('migrations')
	    ], 'migrations');
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
