<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Models\Club;
use App\Models\Genre;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersSeeder extends Seeder {

    public function run(): void
    {
        $roleService = resolve(RoleService::class);
        $role = $roleService->getRoleByKey(UserRole::SUPER_ADMIN);
        User::upsert([
            [
                'first_name'        => 'Suman',
                'last_name'         => 'Budathoki',
                'user_name'         => 'sumanBudathoki',
                'email'             => 'sumanbudathoki@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => null,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => $role->id,
                'remember_token'    => Str::random(10),
            ],
            [
                'first_name'        => 'Suman',
                'last_name'         => 'Budathoki',
                'user_name'         => 'sandy',
                'email'             => 'sumanbudathoki1@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9842502007',
                'preference'        => null,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 4,
                'remember_token'    => Str::random(10),
            ],
            [
                'first_name'        => 'Suman',
                'last_name'         => 'Budathoki',
                'user_name'         => 'hawabhoot',
                'email'             => 'budhathokisuman384@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => 'band',
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 4,  // admin
                'remember_token'    => Str::random(10),
            ],
        ], ['email'], []);
        User::factory(20)->
            create()->each(function ($user) use ($roleService) {
            $organizerId = $roleService->getRoleByKey(UserRole::ORGANIZER)->id;
            if ($user->role_id == $organizerId)
            {
                Club::factory()->create(['user_id' => $user->id]);
            }
            $user->genres()->sync(Genre::inRandomOrder()->take(3)->pluck('id'));
        });

    }
}
