<?php

namespace App\Providers;

use App\Contracts\AuthenticationInterface;
use App\Contracts\PageInterface;
use App\Contracts\RegistrationInterface;
use App\Models\PersonalAccessToken;
use App\Services\PageService;
use App\Services\RegistrationService;
use App\Services\SanctumAuthenticationService;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegistrationInterface::class, RegistrationService::class);
        $this->app->singleton(AuthenticationInterface::class, SanctumAuthenticationService::class);
        $this->app->singleton(PageInterface::class, PageService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
