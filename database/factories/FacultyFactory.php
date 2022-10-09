<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "Faculty of ".fake()->company,
        ];
    }
}
