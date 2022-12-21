<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonLearningOutcome>
 */
class LessonLearningOutcomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'description' => fake()->sentence,
        ];
    }
}
