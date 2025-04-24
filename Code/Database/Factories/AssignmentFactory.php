<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    public function definition()
    {
        return [
            'asset_id' => 1, // Default asset ID (modify as needed)
            'user_id' => 1, // Default user ID (modify as needed)
            'assigned_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
