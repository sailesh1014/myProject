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
                'value'       => 'hiMusician',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'admin_email',
                'value'       => 'sumanbudhathoki@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_logo',
                'value'       => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_phone',
                'value'       => '9812380822',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'app_address',
                'value'       => 'Itahari, Nepal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'facebook_url',
                'value'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'twitter_url',
                'value'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'instagram_url',
                'value'       => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                  'key'        => 'app_max_genre_count',
                  'value'       => '3',
                  'created_at' => now(),
                  'updated_at' => now(),
             ],
             [
                  'key'        => 'app_min_genre_count',
                  'value'       => '1',
                  'created_at' => now(),
                  'updated_at' => now(),
             ],
        ]);
    }
}
