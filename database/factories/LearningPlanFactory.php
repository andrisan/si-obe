<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningPlan>
 */
class LearningPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'study_material' => $this->faker->words(10, true),
            'learning_method' => $this->faker->words(3, true),
            'estimated_time' => "3x50",
        ];
    }
}
