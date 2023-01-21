<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory {

    protected $model = User::class;

    public function definition(): array
    {
        $roleService = resolve(RoleService::class);
        $role = $roleService->findRoleOrCreate(
            [
                'key' => 'basicUser',
            ],
            [
                'label'       => 'basic User',
                'description' => 'Just Some Dummy Role',
            ]
        );

        return [
            'first_name'        => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role_id'           => $role->id,
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
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
