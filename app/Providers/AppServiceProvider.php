<?php
declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthService;
use App\Services\SettingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::preventLazyLoading(! $this->app->isProduction());
        Schema::defaultStringLength(191);
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });

        if (Schema::hasTable('settings'))
        {
            $settingService = resolve(SettingService::class);
            $settings = $settingService->getCachedSettingsValue();
            //$settingService->updateCachedSettingsValue();
            if ($settings)
            {
                config([
                    'app.name'                              => $settings['app_name'] ?? "Hi Musician",
                    'app.settings.app_logo'                 => $settings['app_logo'] ?? "logo.png",
                    'app.settings.admin_email'              => $settings['admin_email'] ?? "admin@gmail.com",
                    'app.settings.app_address'              => $settings['app_address'] ?? "Nepal",
                    'app.settings.app_phone'                => $settings['app_phone'] ?? "9812345670",
                    'app.settings.app_max_genre_count'      => $settings['app_max_genre_count'] ?? "3",
                    'app.settings.app_min_genre_count'      => $settings['app_min_genre_count'] ?? "1",
                    'app.settings.facebook_url'             => $settings['facebook_url'] ?? "#",
                    'app.settings.twitter_url'              => $settings['twitter_url'] ?? "#",
                    'app.settings.instagram_url'            => $settings['instagram_url'] ?? "#",
                ]);
            }
        }
    }
}
