<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->sentence(rand(5,7)),
            "code" => fake()->lexify((str_repeat('?', 5))),
            "course_credit" => fake()->numberBetween(2, 3),
            "lab_credit" => fake()->numberBetween(0, 1),
            "type" => fake()->randomElement(["mandatory", "elective"]),
            "short_description" => fake()->sentence(25),
            "minimal_requirement" => fake()->sentence(3),
            "study_material_summary" => fake()->sentence(rand(5, 10)),
            "learning_media" => fake()->sentence(rand(5, 10)),
        ];
    }
}
