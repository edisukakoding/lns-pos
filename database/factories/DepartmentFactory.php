<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['department_code' => "string", 'department_name' => "string", 'description' => "array|string"])] public function definition(): array
    {
        return [
            'department_code' => 'EX' . $this->faker->numerify(),
            'department_name' => $this->faker->jobTitle(),
            'description' => $this->faker->realText()
        ];
    }
}
