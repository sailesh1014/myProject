<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder {

    public function run(): void
    {
        Role::upsert([
            [
                'key'         => 'superAdmin',
                'name'        => 'Super Admin',
                'description' => 'Super Admin can manage anything',
                'preserved'   => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'admin',
                'name'        => 'Admin',
                'description' => 'Owner and could manage all data related to the inventory',
                'preserved'   => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'basicUser',
                'name'        => 'Basic User',
                'description' => 'User level authorization can perform basic tasks',
                'preserved'   => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'artist',
                'name'        => 'Artist',
                'description' => 'User level authorization can perform basic tasks',
                'preserved'   => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'organizer',
                'name'        => 'Organizer',
                'description' => 'User level authorization perform can basic tasks',
                'preserved'   => 0,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ], ['key'], ['name','description', 'updated_at']);
    }
}
