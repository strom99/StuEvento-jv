<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserEventsAttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los usuarios y eventos existentes
        $users = User::all();
        $events = Event::all();

        // Recorrer los usuarios y eventos para crear instancias de UserEventsAttendee con datos aleatorios
        foreach ($users as $user) {
            // Generar un número aleatorio de asistentes a eventos para cada usuario (entre 1 y 5)
            $randomAttendeesCount = rand(1, 5);

            // Obtener eventos aleatorios
            $randomEvents = $events->random($randomAttendeesCount);

            // Crear instancias de UserEventsAttendee con datos aleatorios
            foreach ($randomEvents as $event) {
                UserEventsAttendee::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    // Agregar otros campos con datos aleatorios si es necesario
                ]);
            }
        }

    }
}
