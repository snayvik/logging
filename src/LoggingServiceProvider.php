<?php

namespace Snvk\Logging;
use Illuminate\Support\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
    public function boot(){       
        $this->loadMigrationsFrom(__DIR__.'/migrations');        
    }

    public function register()
    {
        //
    }
}