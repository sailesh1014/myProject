<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register(): void
    {
        $model = collect([
            'User',
            'Genre',
            'Role',
            'Club',
            'Permission',
            'Event',
            'EventImage'
        ]);
        $model->each(function ($el) {
            $this->app->bind("App\\Interfaces\\{$el}RepositoryInterface", "App\\Repositories\\{$el}Repository");
        });
    }


    public function boot(): void {}
}
