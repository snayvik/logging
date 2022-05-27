<?php

namespace Snvk\Contact;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot(){       
        $this->loadMigrationsFrom(__DIR__.'/migrations');        
    }

    public function register()
    {
        //
    }
}