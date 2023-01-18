<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{

    public function run(): void
    {
        Role::upsert([
            [
                'name' => 'superAdmin',
                'label' => 'Super Admin',
                'description' => 'Super Admin can manage anything',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'admin',
                'label' => 'Admin',
                'description' => 'Owner and could manage all data related to the inventory',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'basicUser',
                'label' => 'Basic User',
                'description' => 'User level authorization can perform basic tasks',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'artist',
                'label' => 'Artist',
                'description' => 'User level authorization can perform basic tasks',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'organizer',
                'label' => 'Organizer',
                'description' => 'User level authorization perform can basic tasks',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ], ['name'], ['label','description','updated_at']);
    }
}
