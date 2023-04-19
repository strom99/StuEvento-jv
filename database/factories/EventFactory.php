<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->name(),
            'location' => $this->faker->country(),
            'date' => Carbon::now()->format('Y-m-d H:i'),
            'user_id' => User::inRandomOrder()->value('id'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
