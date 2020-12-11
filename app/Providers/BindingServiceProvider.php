<?php

namespace App\Providers;

use App\Contracts\ILoginService;
use App\Contracts\IUserService;
use App\Contracts\IUserStatusService;
use App\Services\LoginService;
use App\Services\UserService;
use App\Services\UserStatusService;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IUserStatusService::class, UserStatusService::class);
        $this->app->bind(ILoginService::class, LoginService::class);
    }
}
