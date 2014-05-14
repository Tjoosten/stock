<?php namespace Codivex\Generator;

use Illuminate\Support\ServiceProvider;

class GenerateServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->bind('generator', 'Codivex\Generator\GenerateService');
    }

}