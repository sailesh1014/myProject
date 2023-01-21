<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {

    public function run(): void
    {
        Permission::upsert([
            /**
             * User Model Related Permissions
             */
            [
                'key'         => 'user-view',
                'name'        => 'User View',
                'description' => 'Allows to view users',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'user-create',
                'name'        => 'User Create',
                'description' => 'Allows to create user',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'user-update',
                'name'        => 'User Update',
                'description' => 'Allows to update user',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'user-destroy',
                'name'        => 'User Destroy',
                'description' => 'Allows to destroy user',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            /**
             * Genre Model Related Permissions
             */
            [
                'key'         => 'genre-view',
                'name'        => 'Genre View',
                'description' => 'Allows to view genres',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'genre-create',
                'name'        => 'Genre Create',
                'description' => 'Allows to create user',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'genre-update',
                'name'        => 'Genre Update',
                'description' => 'Allows to update genre',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'key'         => 'genre-destroy',
                'name'        => 'Genre Destroy',
                'description' => 'Allows to destroy user',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ], ['key'], ['name', 'description', 'updated_at']);
    }
}
