<?php

namespace Simplepack\Calculator;

use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider {

	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	include __DIR__.'/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Simplepack\Calculator\CalculatorController');
        $this->loadViewsFrom(__DIR__."/views", 'calculator');
    }
}