<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\specialities>
 */
class specialitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_dosen' => $this->faker->randomElement([19, 21, 22, 23, 24, 25, 26, 27, 28, 29 ,30, 31, 32]),
            'speciality' => $this->faker->randomElement(['Software Engineering', 'Intelligent Gaming', 'Data Science', 'System Security and Cybersecurity', 'Mobile and Responsive App Development', 'Blockchain Technology and Digital Finance', 'Artificial Intelligence and Natural Language Processing', 'IoT'])
        ];
    }
}