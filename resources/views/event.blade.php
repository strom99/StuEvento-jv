<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Event') . ' ' . $event->title }}
        </h2>
    </x-slot>
    <div class="flex items-start justify-between">    
        <div>
            <ul>
            <li>Description: <span>{{ $event->description }}</span></li>
            <li>Location: <span>{{ $event->location }}</span></li>
            <li>Date: <span>{{ $event->date }}</span></li>
        </ul>
        @if($asistents)
        <h3>Asistents:</h3>
        <ol class="list-decimal">
            @foreach($asistents as $asistent)
                <li>{{ $asistent->name }}</li>
            @endforeach
        </ol>
        @else
        <span>0 asistents registered</span>
        @endif
        </div>
                <a class="bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer" 
            href="/events/{{$event->id}}/edit">Edit Event</a> 
               
    </div>
    <a class="block bg-teal-100 hover:bg-teal-200 p-3 rounded-md text-gray-500 cursor-pointer w-max mt-4" 
            href="/events/{{$event->id}}/register">Register Participant</a>
    
</x-app-layout>
