<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title'   => $this->faker->sentence(),
            'intro'   => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
