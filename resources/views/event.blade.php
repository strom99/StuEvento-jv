<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Event') . ' ' . $event->title }}
        </h2>
    </x-slot>
    <div class="">
        <ul>
            <li>Description: <span>{{ $event->description }}</span></li>
            <li>Location: <span>{{ $event->location }}</span></li>
            <li>Date: <span>{{ $event->date }}</span></li>
        </ul>
    </div>
</x-app-layout>
