<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => 1, // Default category ID (modify as needed)
            'status' => $this->faker->randomElement(['available', 'in use', 'under maintenance']),
        ];
    }
}
