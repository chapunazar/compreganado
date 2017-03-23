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
        view()->composer('layouts.sidebar', function ($view){
            
            $archives = \App\Listing::archives();
            $breeds =  \App\Breed::has('listings')->get();
            $categories =  \App\Category::has('listings')->get();
            $paymentmethods =  \App\Paymentmethod::has('listings')->pluck('name');
            
            
            $view->with(compact('archives','paymentmethods','breeds','categories')); 
            
            
            
        });

        view()->composer('console.*', function ($view) {

            $routeAction = request()->route()->getAction();
            if (array_key_exists('_active_menu', $routeAction)) {
                $view->with('_active_menu', $routeAction['_active_menu']);
            }

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
