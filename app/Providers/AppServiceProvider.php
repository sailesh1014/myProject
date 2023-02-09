<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());

        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });
    }
}
