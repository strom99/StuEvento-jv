<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserEventsAttendee>
 */
class UserEventsAttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Genera un user_id aleatorio
            'event_id' => Event::inRandomOrder()->first()->id, // Genera un event_id aleatorio
            
        // Otros campos de tu modelo y sus respectivos 
        ];
    }
}
