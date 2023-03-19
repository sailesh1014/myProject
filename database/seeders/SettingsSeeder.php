<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder {

    public function run(): void
    {
        Setting::insertOrIgnore([
            [
                'key'        => 'app_name',
                'name'       => 'hiMusician',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'admin_email',
                'name'       => 'sumanbudhathoki@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_logo',
                'name'       => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_phone',
                'name'       => '9812380822',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_address',
                'name'       => 'Itahari, Nepal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'facebook_url',
                'name'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'twitter_url',
                'name'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'instagram_url',
                'name'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
