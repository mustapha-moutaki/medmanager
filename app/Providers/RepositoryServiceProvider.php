<?php

namespace App\Providers;

use App\Repositories\StaffRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentUserRepository;


use App\Repositories\EloquentDoctorRepository;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\Interfaces\DoctorRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
{
    $this->app->bind(
        \App\Repositories\Interfaces\UserRepository::class, 
        \App\Repositories\EloquentUserRepository::class,

        DoctorRepositoryInterface::class,
        EloquentDoctorRepository::class,

        // \App\Repositories\Interfaces\StuffRepositoryInterface::class, 
        // \App\Repositories\StuffRepository::class,

        
    );

    $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);

    
}

    public function boot()
    {
        //
    }
}
