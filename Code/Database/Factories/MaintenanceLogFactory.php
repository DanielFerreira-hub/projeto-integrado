<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaintenanceLog>
 */
class MaintenanceLogFactory extends Factory
{
    public function definition()
    {
        return [
            'asset_id' => 1, // Default asset ID (modify as needed)
            'description' => $this->faker->sentence(),
            'performed_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
