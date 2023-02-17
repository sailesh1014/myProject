<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthService;
use App\Services\SettingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });

        if (Schema::hasTable('settings')) {
            $settingService = resolve(SettingService::class);
            $settings = $settingService->getCachedSettingsValue();
            //$settingService->updateCachedSettingsValue();
            if($settings){
                config([
                    'app.name'                                      => $settings['app_name'],
                    'app.settings.app_logo'                         => $settings['app_logo'],
                    'app.settings.admin_email'                      => $settings['admin_email'],
                    'app.settings.app_address'                      => $settings['app_address'],
                ]);
            }
        }
    }
}
