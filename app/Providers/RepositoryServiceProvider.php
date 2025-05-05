<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
{
    $this->app->bind(
        \App\Repositories\Interfaces\UserRepository::class, 
        \App\Repositories\EloquentUserRepository::class
    );
}

    public function boot()
    {
        //
    }
}
