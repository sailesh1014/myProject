<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ClubFactory extends Factory {

    public function definition(): array
    {
        return [
            'name'             => $this->faker->name(),
            'address'          => $this->faker->address(),
            'thumbnail'        => null,
            'description'      => $this->faker->sentences(4, true),
            'established_date' => $this->faker->date(),
            'user_id'          => '',
        ];
    }
}
