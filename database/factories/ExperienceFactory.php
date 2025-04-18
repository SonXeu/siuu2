<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),  // Liên kết với người dùng
        ];
    }
}
