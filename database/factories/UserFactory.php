<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'code' => $this->faker->randomNumber(4),
            'img' => $this->faker->imageUrl(width:32,height:32),
            'startTime' => $this->faker->time('9:00'),
            'endTime' => $this->faker->time('18:00'),
        ];
    }


}
