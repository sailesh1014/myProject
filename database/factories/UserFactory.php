<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Constants\PreferenceType;
use App\Constants\UserRole;
use App\Models\Genre;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory {

    protected $model = User::class;

    public function definition(): array
    {
        $roleService = resolve(RoleService::class);
        $roles = $roleService->getRoleByKey([UserRole::ORGANIZER, UserRole::ARTIST, UserRole::BASIC_USER])->pluck('key', 'id')->toArray();
        $selectedRole = $this->faker->randomElement(array_keys($roles));

        return [
            'first_name'        => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'user_name'         => $this->faker->unique()->word(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'gender'            => 'male',
            'preference'        => $roles[$selectedRole] === UserRole::ARTIST ? $this->faker->randomElement(array_keys(PreferenceType::LIST)) : null,
            'dob'               => now(),
            'address'           => 'Nepal',
            'phone'             => '9812345678',
            'email_verified_at' => now(),
            'role_id'           => $selectedRole,
            'remember_token'    => Str::random(10),
        ];
    }

    public function unverified(): UserFactory
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
