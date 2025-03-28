<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\EloquentUserRepository;


use App\Repositories\Interfaces\DoctorRepositoryInterface;
use App\Repositories\EloquentDoctorRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
{
    $this->app->bind(
        \App\Repositories\Interfaces\UserRepository::class, 
        \App\Repositories\EloquentUserRepository::class,
                            DoctorRepositoryInterface::class,
                            EloquentDoctorRepository::class
    );

    
}

    public function boot()
    {
        //
    }
}
