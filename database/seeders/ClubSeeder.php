<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Models\Club;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClubSeeder extends Seeder {

    public function run()
    {
        $roleService = resolve(RoleService::class);
        $userService = resolve(UserService::class);
        $organizerRole = $roleService->getRoleByKey(UserRole::ORGANIZER);
        $organizer = $userService->findUserOrCreate(
            ['role_id' => $organizerRole->id],
            [
                'first_name'        => 'Suman4',
                'last_name'         => 'Budathoki4',
                'user_name'         => 'sumanBudathoki4',
                'email'             => 'sumanbudathoki4@gmail.com',
                'gender'            => 'male',
                'phone'             => '9812345678',
                'address'           => 'Nepal',
                'preference'        => PreferenceType::SOLO,
                'dob'               => now(),
                'email_verified_at' => now(),
                'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token'    => Str::random(10),
            ]
        );
        Club::upsert([
            [
                'name'             => 'The Purple Haze',
                'address'          => 'Nepal',
                'thumbnail'        => 'sumanbudathoki@gmail.com',
                'description'      => 'this club belongs to Suman Budathoki',
                'established_date' => now(),
                'user_id'          => $organizer->id,
            ],
        ], ['user_id'], ['name', 'address', 'thumbnail', 'description', 'established_date']);
    }
}
