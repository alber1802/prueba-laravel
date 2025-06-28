<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Materia;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calicacion>
 */
class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'student_id' => Student::inRandomOrder()->first()->id,
            'materia_id' => Materia::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'nota' => fake()->numberBetween(35, 100),
        ];
    }
}
