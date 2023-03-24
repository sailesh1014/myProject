<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            GenreSeeder::class,
            UsersSeeder::class,
            RatingSeeder::class,
            EventSeeder::class,
            PermissionSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
