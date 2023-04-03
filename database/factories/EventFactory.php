<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Constants\EventStatus;
use App\Constants\PreferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;


class EventFactory extends Factory {

    public function definition()
    {
        return [
            'title'       => $this->faker->word(),
            'excerpt'     => $this->faker->sentence(),
            'description' => $this->faker->sentences(5, true),
            'thumbnail'   => "",
            'fee'         => $this->faker->numberBetween(200, 300),
            'status'      => $this->faker->randomElement(EventStatus::LIST,1),
            'preference'  => $this->faker->randomElement(array_keys(PreferenceType::LIST)),
            'event_date'  => $this->faker->dateTimeBetween('-1 week', '+1 month'),
            'club_id'     => null,
        ];
    }
}
