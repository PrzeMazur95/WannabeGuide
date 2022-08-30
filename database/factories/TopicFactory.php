<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'description' => fake()->text,
            'status' => rand(0,2),
            'category' => fake()->word,
            'user_id'=>function(){
                return User::factory()->create()->id;
            }
        ];
    }
}
