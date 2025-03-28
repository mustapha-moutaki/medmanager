<?php

namespace App\Providers;

use App\Repositories\StaffRepository;
use App\Services\forgetPasswordService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ForgetPasswordRepository;
use App\Repositories\Interfaces\StaffRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ForgetPasswordRepository::class, function () {
            return new ForgetPasswordRepository();
            

            StaffRepositoryInterface::class;
            StaffRepository::class;

        });

        $this->app->bind(forgetPasswordService::class, function ($app) {
            return new ForgetPasswordService($app->make(ForgetPasswordRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
