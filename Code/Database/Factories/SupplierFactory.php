<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'contact' => $this->faker->phoneNumber(),
        ];
    }
}
