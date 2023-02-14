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
                'key'        => 'company_address',
                'name'       => 'Itahari, Nepal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
