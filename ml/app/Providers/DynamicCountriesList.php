<?php

namespace App\Providers;

use App\Countries;
use Illuminate\Support\ServiceProvider;
 

class DynamicCountriesList extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('paises', Countries::all());
        });
    }
}
