<?php
namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),  // Sử dụng factory của User
            'job_id' => \App\Models\Job::factory(),   // Sử dụng factory của Job
        ];
    }
}
