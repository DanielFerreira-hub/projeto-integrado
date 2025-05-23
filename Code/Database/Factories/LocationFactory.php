<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'address' => $this->faker->address(),
        ];
    }
}
