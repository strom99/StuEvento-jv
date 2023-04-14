<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="bg-white h-screen">
        <ul>
            @foreach ($eventos as $evento)
                <li class="event"> 
                    <h2>{{$evento->title}}</h2>
                    <p>{{$evento->description}}</p>
                    <span>{{ $evento->location }}</span>
                    <span>{{ $evento->date }}</span>
                    <span>{{ $evento->created_at }}</span>
                </li>
            @endforeach
        </ul>
        
    </div>
</x-app-layout>
