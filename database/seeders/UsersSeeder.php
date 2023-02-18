<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
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
                'first_name'        => 'Suman1',
                'last_name'         => 'Budathoki1',
                'user_name'         => 'sumanBudathoki1',
                'email'             => 'sumanbudathoki1@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => null,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 2,  // admin
                'remember_token'    => Str::random(10),
            ],
            [
                'first_name'        => 'Suman2',
                'last_name'         => 'Budathoki2',
                'user_name'         => 'sumanBudathok2',
                'email'             => 'sumanbudathoki2@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => null,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 3,  // Basic User
                'remember_token'    => Str::random(10),
            ],
            [
                'first_name'        => 'Suman3',
                'last_name'         => 'Budathoki3',
                'user_name'         => 'sumanBudathok3',
                'email'             => 'sumanbudathoki3@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => PreferenceType::SOLO,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 4,  // Artist
                'remember_token'    => Str::random(10),
            ],
            [
                'first_name'        => 'Suman4',
                'last_name'         => 'Budathoki4',
                'user_name'         => 'sumanBudathoki4',
                'email'             => 'sumanbudathoki4@gmail.com',
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender'            => 'male',
                'address'           => 'Nepal',
                'phone'             => '9812345678',
                'preference'        => null,
                'dob'               => now(),
                'email_verified_at' => now(),
                'role_id'           => 5,  // Organizer
                'remember_token'    => Str::random(10),
            ],
        ], ['email'], []);
        User::factory(20)->create();
    }
}
