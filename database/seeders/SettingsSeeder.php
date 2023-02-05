<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insertOrIgnore([
            [
                'key' => 'app_name',
                'name' => 'hiMusician',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'admin_email',
                'name' => 'sumanbudhathoki1@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'company_address',
                'name' => 'hiMusician',
                'created_at' => now(),
                'updated_at' => now()
            ],


        ]);
    }
}
